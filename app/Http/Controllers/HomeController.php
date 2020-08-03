<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\User;



class HomeController extends Controller
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
            ["title" => "Home", "url" =>""]
        ]);

        $totalUsers = User::count();
        $totalArticles = Article::count();
        $totalAuthors = User::where('isAuthor', '=', '1')->count();

        return view('home',compact('listBreadcrumbs', 'totalUsers', 'totalArticles', 'totalAuthors'));
    }
}
