<?php

namespace App\Admin\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    //

    public function upImage(Request $request, ImageUploadHandler $uploader)
    {
        $data = [
            'errno' => 1
        ];
        if ($file = $request->upload_file) {
            $result = $uploader->save($file, 'admin', 'editor');
            if ($result) {
                $data['data'][] = $result['path'];
                $data['errno'] = 0;
            }
        }
        return $data;
    }
}
