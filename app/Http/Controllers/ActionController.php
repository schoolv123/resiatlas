<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{
    function __construct()
    {
        $this->now = date('Y-m-d H:i:s');
    }
    protected function StaticPageData(Request $req, string $pagename)
    {
        if ($pagename == 'home') {
            $req->validate([
                'banner_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
                'banner_text' => 'required|string',
                'section1_header' => 'required|string',
                'section1_para' => 'required|string',
                'section2_header' => 'required|string',
            ]);

            $formData = $req->all();
            if (!empty($formData['banner_image'])) {
                $uploadPath = 'uploads';
                $prevData = DB::table('blocks')->where(['pagename' => $pagename, 'name' => 'banner_image', 'type' => 'image'])->first('content');
                $imagedeleteStatus = !empty($prevData->content) ? $this->removeImage($prevData->content) : false;
                $fileName = 'banner_image_' . time() . '.' . $formData['banner_image']->extension();
                $formData['banner_image']->move(public_path($uploadPath), $fileName);
                DB::table('blocks')->where(['pagename' => $pagename, 'name' => 'banner_image'])->update(['content' => $uploadPath . '/' . $fileName]);
            }
            foreach ($req->all() as $key => $val) {
                $fieldName = (string) $key;
                if ($fieldName == 'banner_image')
                    continue;
                $content = $val;
                DB::table('blocks')->where(['pagename' => $pagename, 'name' => $fieldName])->update(['content' => $content]);
            }
        } elseif ($pagename == 'about') {
            $req->validate([
                'section1_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
                'section1_header' => 'required|string',
                'section1_para' => 'required|string',
                'section2_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
                'section2_header' => 'required|string',
                'section2_para' => 'required|string',
            ]);
            $formData = $req->all();
            if (!empty($formData['section1_image'])) {
                $uploadPath = 'uploads';
                $prevData = DB::table('blocks')->where(['pagename' => $pagename, 'name' => 'section1_image', 'type' => 'image'])->first('content');
                $imagedeleteStatus = !empty($prevData->content) ? $this->removeImage($prevData->content) : false;
                $fileName = 'section1_image' . time() . '.' . $formData['section1_image']->extension();
                $formData['section1_image']->move(public_path($uploadPath), $fileName);
                DB::table('blocks')->where(['pagename' => $pagename, 'name' => 'section1_image'])->update(['content' => $uploadPath . '/' . $fileName]);
            }
            if (!empty($formData['section2_image'])) {
                $uploadPath = 'uploads';
                $prevData = DB::table('blocks')->where(['pagename' => $pagename, 'name' => 'section2_image', 'type' => 'image'])->first('content');
                $imagedeleteStatus = !empty($prevData->content) ? $this->removeImage($prevData->content) : false;
                $fileName = 'section2_image_' . time() . '.' . $formData['section2_image']->extension();
                $formData['section2_image']->move(public_path($uploadPath), $fileName);
                DB::table('blocks')->where(['pagename' => $pagename, 'name' => 'section2_image'])->update(['content' => $uploadPath . '/' . $fileName]);
            }
            foreach ($req->all() as $key => $val) {
                $fieldName = (string) $key;
                if ($fieldName == 'section1_image' || $fieldName == 'section2_image')
                    continue;
                $content = $val;
                DB::table('blocks')->where(['pagename' => $pagename, 'name' => $fieldName])->update(['content' => $content]);
            }
        }
        return back()->with('success', 'Blocks updated');
    }

    private function removeImage(string $path)
    {
        $deletePath = public_path($path);
        if (file_exists($deletePath) && unlink($deletePath)) {
            return true;
        } else {
            return false;
        }
    }

    protected function FAQAction(Request $req)
    {
        $req->validate([
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        if ($req->action == 'add') {
            DB::table('blocks')->insert([
                'name' => 'faq' . time(),
                'title' => $req->title,
                'content' => $req->description,
                'pagename' => 'faq',
                'type' => 'text',
                'created_at' => $this->now,
                'updated_at' => $this->now
            ]);
            return redirect('/faq')->with('success', 'FAQ added successfully');
        } elseif ($req->action === 'update') {
            DB::table('blocks')->where(['pagename' => 'faq', 'id' => $req->faqId])
                ->update([
                    'title' => $req->title,
                    'content' => $req->description,
                    'updated_at' => $this->now
                ]);
            return back()->with('success', 'FAQ updated successfully');
        } else {
            return back()->with('warning', 'Invalid action');
        }
    }

    protected function RemoveFAQ(string $faqId)
    {
        $delete = DB::table('blocks')->where('id', $faqId)->delete();
        $rescode = 400;
        if ($delete) {
            $rescode = 200;
            $res = ['status' => true, 'message' => 'FAQ deleted', 'data' => ['id' => $faqId]];
        } else {
            $res = ['status' => false, 'message' => 'Failed to delete FAQ', 'data' => ['id' => $faqId]];
        }
        return response($res, $rescode, []);
    }
}
