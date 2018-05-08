<?php

namespace App\Http\Controllers;

use zgldh\QiniuStorage\QiniuStorage;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function uploadImage(Request $request)
    {
        $disk = QiniuStorage::disk('qiniu');
        $filename = $disk->put('/images/post/' . date('Y/m/d'), $request->file('upload_file'));
        $img_url = substr($disk->downloadUrl($filename), 7, strlen($disk->downloadUrl($filename)) - 1);
        if (!$filename) {
            $data = [
                "success" => false,
                "msg" => "failed!",
                "file_path" => "none"
            ];
            return $data;
        }
        $data = [
            "success" => true,
            "msg" => "successed!",
            "file_path" => "//$img_url"
        ];
        return $data;
    }

}
