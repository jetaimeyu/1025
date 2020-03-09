<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    //
    public function index(Content $content)
    {
        $user = User::find(1);
        return $content
            ->title('dddd')
            ->description("描述")
            ->body(view('admin.manage', ['user'=>$user, 'title'=> '管理页面']));

    }
}
