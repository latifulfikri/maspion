<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ApiCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::get();

        return $category;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'name_category' => ['required',],
            'style' => ['required', 'in:primary,secondary,success,warning,danger,info'],
        ]);

        if ($validator->fails()) {

            return $validator->errors();
        }

        try {

            $category = Category::create([
                'name_category' => $req->name_category,
                'style' => $req->style,
            ]);

            return $category;
        } catch (QueryException $e) {
            $response = [
                'message' => 'New category does not created!',
                'data' => $e,
            ];

            return $response;
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $category = Category::where('id', $id)->first();

        if ($category == null) {

            return $category;
        }

        $validator = Validator::make($req->all(), [
            'name_category' => ['required',],
            'style' => ['required', 'in:primary,secondary,success,warning,danger,info'],
        ]);

        if ($validator->fails()) {

            return $validator->errors();
        }

        try {

            $category->update([
                'name_category' => $req->name_category,
                'style' => $req->style,
            ]);

            return $category;
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
        $category = Category::where('id', $id)->first();

        if ($category == null) {
            return $category;
        }

        try {
            $category->delete();

            $response = [
                'message' => 'Account deleted!',
            ];

            return $response;
        } catch (QueryException $e) {

            return $e;
        }
    }
}
