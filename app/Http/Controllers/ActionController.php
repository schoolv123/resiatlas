<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{
    protected function StaticPageData(Request $req, string $pagename)
    {
        if ($pagename == 'home') {
            $req->validate([
                'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'banner_text' => 'required|string',
                'section1_header' => 'required|string',
                'section1_para' => 'required|string',
                'section2_header' => 'required|string',
            ]);
        }

        foreach ($req->all() as $key => $val) {
            $fieldName = (string) $key;
            $content = addslashes($val);
            DB::table('blocks')->where(['pagename' => $pagename, 'name' => $fieldName])->update(['content' => $content]);
        }
        return back()->with('success', 'Blocks updated');
    }
}
