<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $blocks = DB::table('blocks')->where('pagename', $pagename)->get() ?? [];
        return view('pages.staticpages', ['blocks' => $blocks]);
    }
    protected function FAQpage()
    {
        $blocks = DB::table('blocks')->where('pagename', 'faq')->get() ?? [];
        return view('pages.FAQ.index', ['faqData' => $blocks]);
    }
    protected function AddFAQ()
    {
        return view('pages.FAQ.add');
    }
    protected function EditFAQ(string $faqname)
    {
        $blocks = DB::table('blocks')->where(['pagename' => 'faq', 'name' => $faqname])->first() ?? [];
        return view('pages.FAQ.add', ['faqData' => $blocks]);
    }
}
