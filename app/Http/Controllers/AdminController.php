<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\User;



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBreadcrumbs = json_encode([
            ["title" => "Admin", "url" =>""]
        ]);

        $totalUsers = User::count();
        $totalArticles = Article::count();
        $totalAuthors = User::where('isAuthor', '=', '1')->count();
        $totalAdmins = User::where('admin', '=', '1')->count();

        return view('admin',compact('listBreadcrumbs', 'totalUsers', 'totalArticles', 'totalAuthors', 'totalAdmins'));
    }
}
