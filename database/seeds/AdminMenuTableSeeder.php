<?php

use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\Menu;
use Illuminate\Support\Facades\DB;

class AdminMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $menu = [
            [
                'parent_id' => 0,
                'order' => 8,
                'title' => '配置管理',
                'icon' => 'fa-gears',
                'uri' => 'admin-config',
            ]
        ];
        Menu::insert($menu);
        DB::table('admin_menu')->where('id', 1)->update(['title' => '后台首页']);
        DB::table('admin_menu')->where('id', 2)->update(['order' => 999, 'title' => '管理员']);
        DB::table('admin_menu')->where('id', 3)->update(['title' => '管理员列表']);
        DB::table('admin_menu')->where('id', 4)->update(['title' => '规则']);
        DB::table('admin_menu')->where('id', 5)->update(['title' => '权限']);
        DB::table('admin_menu')->where('id', 6)->update(['title' => '后台菜单']);
        DB::table('admin_menu')->where('id', 7)->update(['title' => '操作日志']);
    }
}
