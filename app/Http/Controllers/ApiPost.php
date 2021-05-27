<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ApiPost extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::join('category', 'post.category_id', '=', 'category.id')->join('account', 'post.account_id', '=', 'account.id')->select('post.*', 'category.category_name', 'category.style', 'account.name', 'account.email', 'account.joe')->orderBy('date', 'DESC')->get();

        return $post;
    }

    public function Trending()
    {
        $post = Post::join('category', 'post.category_id', '=', 'category.id')->join('account', 'post.account_id', '=', 'account.id')->select('post.*', 'category.category_name', 'category.style', 'account.name', 'account.email', 'account.joe')->orderBy('like', 'ASC')->skip(0)->take(10)->get();

        return $post;
    }

    public function Late()
    {
        $post = Post::join('category', 'post.category_id', '=', 'category.id')->join('account', 'post.account_id', '=', 'account.id')->select('post.*', 'category.category_name', 'category.style', 'account.name', 'account.email', 'account.joe')->orderBy('created_at', 'DESC')->get();

        return $post;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'account_id' => ['required', 'exists:account,id'],
            'category_id' => ['required', 'exists:category,id'],
            'title' => ['required', 'max:255'],
            'desc' => ['required', 'max:255'],
            'pict' => ['required', 'mimes:jpeg,png'],
        ]);

        if ($validator->fails()) {

            return $validator->errors();
        }

        try {

            $ext = $req->pict->extension();
            $name = time() . '.' . $ext;
            $req->pict->storeAs('/public/post', $name);
            $url = '/storage/post/' . $name;

            $post = Post::create([
                'category_id' => $req->category_id,
                'account_id' => $req->account_id,
                'date' => date("Y-m-d"),
                'title' => $req->title,
                'desc' => $req->desc,
                'pict' => $url,
                'like' => 0,
                'share' => 0,
                'reported' => 0,
            ]);

            return $post;
        } catch (QueryException $e) {

            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function reported()
    {
        $post = Post::where('reported',)->first();

        if ($post == null) {
            $response = [
                'message' => 'There is no reported post!'
            ];

            return $response;
        } else {
            $post = Post::join('category', 'post.category_id', '=', 'category.id')->join('account', 'post.account_id', '=', 'account.id')->select('post.*', 'category.category_name', 'category.style', 'account.name', 'account.email', 'account.joe')->orderBy('date', 'DESC')->get();

            return $post;
        }
    }

    public function report($id)
    {
        $post = Post::where('id', $id)->first();

        if ($post == null) {
            $response = [
                'message' => 'Post data does not exist!'
            ];

            return $response;
        }

        try {
            $post->update([
                'reported' => 1,
            ]);

            return $post;
        } catch (QueryException $e) {
            return $e;
        }
    }

    public function unreport($id)
    {
        $post = Post::where('id', $id)->first();

        if ($post == null) {
            $response = [
                'message' => 'Post data does not exist!'
            ];

            return $response;
        }

        try {
            $post->update([
                'reported' => 0,
            ]);

            return $post;
        } catch (QueryException $e) {
            return $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $post = Post::where('id', $id)->first();

        if ($post == null) {
            $response = [
                'message' => 'Post data does not exist!'
            ];

            return $response;
        }

        $validator = Validator::make($req->all(), [
            'category_id' => ['required', 'exists:category,id'],
            'title' => ['required', 'max:255'],
            'desc' => ['required', 'max:255'],
            'pict' => ['required', 'mimes:jpeg,png'],
        ]);

        if ($validator->fails()) {

            return $validator->errors();
        }

        try {

            if ($req->hasFile('pict')) {
                if ($post['pict'] != "") {
                    $path = explode("/", $post['pict']);
                    $pictname = end($path);
                    unlink(storage_path('app/public/post/' . $pictname));
                }

                $ext = $req->pict->extension();
                $name = time() . '.' . $ext;
                $req->pict->storeAs('/public/post', $name);
                $url = '/storage/post/' . $name;
            } else {
                $url = $post['pict'];
            }

            $post->update([
                'category_id' => $req->category_id,
                'title' => $req->title,
                'desc' => $req->desc,
                'pict' => $url,
            ]);

            return $post;
        } catch (QueryException $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();

        if ($post == null) {
            $response = [
                'message' => 'Post data does not exist!'
            ];

            return $response;
        }

        if ($post['pict'] != "") {
            $path = explode("/", $post['pict']);
            $pictname = end($path);
            unlink(storage_path('app/public/post/' . $pictname));
        }

        try {
            $post->delete();

            $response = [
                'message' => 'Post data deleted!',
            ];

            return $response;
        } catch (QueryException $e) {
            return $e;
        }
    }
}
