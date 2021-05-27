<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPages extends Controller
{
    public function index()
    {
        return view('dashboard.admin.index');
    }

    public function myArticles()
    {
        return view('dashboard.user.index');
    }

    public function writeArticles()
    {
        return view('dashboard.user.writeArticle');
    }

    public function userTable()
    {
        return view('dashboard.admin.userTable');
    }
    public function adminTable()
    {
        return view('dashboard.admin.adminTable');
    }
    public function categoryTable()
    {
        return view('dashboard.admin.categoryTable');
    }
    public function articlesTable()
    {
        return view('dashboard.admin.articlesTable');
    }
    public function editProfile()
    {
        return view('dashboard.admin.editProfile');
    }
    public function createCategory()
    {
        return view('dashboard.admin.store.category');
    }
    public function createAdmin()
    {
        return view('dashboard.admin.store.admin');
    }
    public function createArticles()
    {
        return view('dashboard.user.createArticles');
    }
}
