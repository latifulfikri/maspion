<?php

namespace App\Http\Controllers;

use App\Models\PostBody;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ApiPostBody extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pb = PostBody::get();

        return $pb;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'post_id' => ['required', 'exists:post,id'],
            'pict' => ['mimes:jpeg,png'],
            'sub_title' => ['max:255'],
            'body' => ['required'],
        ]);

        if ($validator->fails()) {

            return $validator->errors();
        }

        try {

            $url = "";
            $st = "";

            if ($req->hasFile('pict')) {
                $ext = $req->pict->extension();
                $name = time() . '.' . $ext;
                $req->pict->storeAs('/public/post/body', $name);
                $url = '/storage/post/body/' . $name;
            }

            if ($req->sub_title != null) {
                $st = $req->sub_title;
            }

            $post = PostBody::create([
                'post_id' => $req->post_id,
                'pict' => $url,
                'sub_title' => $st,
                'body' => $req->body,
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
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $pb = PostBody::where('id', $id)->first();

        if ($pb == null) {
            $response = [
                'message' => 'Post body data does not exist!'
            ];

            return $response;
        }

        $validator = Validator::make($req->all(), [
            'post_id' => ['required', 'exists:post,id'],
            'pict' => ['mimes:jpeg,png'],
            'sub_title' => ['max:255'],
            'body' => ['required'],
        ]);

        if ($validator->fails()) {

            return $validator->errors();
        }

        try {

            $url = $pb['pict'];
            $st = "";

            if ($req->hasFile('pict')) {
                $ext = $req->pict->extension();
                $name = time() . '.' . $ext;
                $req->pict->storeAs('/public/post/body', $name);
                $url = '/storage/post/body/' . $name;
            }

            if ($req->sub_title != null) {
                $st = $req->sub_title;
            }

            $pb->update([
                'post_id' => $req->post_id,
                'pict' => $url,
                'sub_title' => $st,
                'body' => $req->body,
            ]);

            return $pb;
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
        $pb = PostBody::where('id', $id)->first();

        if ($pb == null) {
            $response = [
                'message' => 'Post body data does not exist!'
            ];

            return $response;
        }

        try {
            $pb->delete();

            $response = [
                'message' => 'Post body data deleted!',
            ];

            return $response;
        } catch (QueryException $e) {
            return $e;
        }
    }
}
