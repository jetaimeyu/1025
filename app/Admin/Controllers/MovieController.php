<?php

namespace App\Admin\Controllers;

use App\Models\Movies;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MovieController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Movies';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Movies());
        $grid->enableHotKeys();
        $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
            $create->text('title', '标题');

            $create->text('discribe', '描述');
            $create->text('director', '描述');
            $create->text('rate', '描述');
            $create->select('released',[0,1]);
            $create->select('released', '是否上映')->options([
                0=>'未上映',
                1=>'已上映'
            ]);
            $create->datetime('released_at', '上映时间');
        });

        $grid->header(function ($query) {
            return 'header';
        });
        $grid->actions(function ($actions){
//            $actions->disableDelete();
//            $actions->disableEdit();
        });
        $grid->column('id', __('Id'))->sortable();
        $grid->column('title', __('标题'))->editable();
        $grid->column('director', __('Director'))->display(function ($userId){
            return User::find($userId)->name;

        });
        $grid->column('discribe', __('描述'));
        $grid->column('rate', __('Rate'));
        $grid->column('released', __('上映？'))->display(function ($released){
            return $released?"是":"否";
        });
        $grid->column('released_at', __('上映时间'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));
        $grid->filter(function ($filter){
            $filter->between('created_at', "Created Time")->datetime();
            $filter->like('title', '标题');
            $filter->like('discribe', '描述');
            $filter->equal('director', "导演ID")->placeholder('请输入。。。');
            $filter->column(1/2,function ($filter){
                $filter->equal('released','是否上映' )->radio([
                    1=>'YES',
                    0=>'NO'
                ]);

            });
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Movies::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('director', __('Director'));
        $show->field('discribe', __('Discribe'));
        $show->field('rate', __('Rate'));
        $show->field('released', __('Released'));
        $show->field('released_at', __('Released at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Movies());

        $form->text('title', __('Title'));
        $form->number('director', __('Director'));
        $form->text('discribe', __('Discribe'));
        $form->switch('rate', __('Rate'));
        $form->text('released', __('Released'));
        $form->datetime('released_at', __('Released at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
