<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    protected function index()
    {
        return view('pages.login');
    }
    protected function Dashboard()
    {
        return view('pages.dashboard');
    }
    protected function Staticpage(Request $req, string $pagename)
    {
        return view('pages.staticpage');
    }
    protected function FAQpage()
    {
        return view('pages.FAQ.index');
    }
}
