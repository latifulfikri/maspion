<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiPost;

class PagesController extends Controller
{

    protected $ApiPost;

    public function __construct(ApiPost $ApiPost)
    {
        $this->ApiPost = $ApiPost;
    }

    public function index()
    {
        $trending = $this->ApiPost->Trending();
        $lates = $this->ApiPost->Late();
        return view('user.index', ['trending' => $trending, 'lates' => $lates]);
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
}
