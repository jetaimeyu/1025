<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\OSS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StaticPageController extends Controller
{
    //
    public function index()
    {
        $time = time();
        return view('static_pages.home', compact('time'));
    }

    public function upload(Request $request)
    {
//        $this->validate($request,[
//           'imgt' => 'required'
//        ]);
        if (!$request->hasFile('imgt')){
            echo 11;
            session()->flash('danger', '无文件');
            return back();
        }
        //获取上传的文件
        $file = $request->file('imgt');
        //获取上传图片的临时地址
        $tmppath = $file->getRealPath();
        //生成文件名
        $fileName = Str::random(5) . $file->getFilename() . time() .date('ymd') . '.' . $file->getClientOriginalExtension();
        //拼接上传的文件夹路径(按照日期格式1810/17/xxxx.jpg)
        $pathName = date('Y-m/d').'/'.$fileName;
        //上传图片到阿里云OSS
        OSS::publicUpload('jetaimeyu', $pathName, $tmppath, ['ContentType' => $file->getClientMimeType()]);
        //获取上传图片的Url链接
        $Url = OSS::getPublicObjectURL('jetaimeyu', $pathName);
        // 返回状态给前端，Laravel框架会将数组转成JSON格式
        session()->flash('success', '上传成功， src='.$Url);
        return back(); ['code' => 0, 'msg' => '上传成功', 'data' => ['src' => $Url]];

    }

    public function help()
    {
        return view('static_pages.help');
    }

    public function about()
    {
        return view('static_pages.about');

    }
}
