<?php

namespace App\Admin\Controllers;

use App\Project;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ProjectController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('项目');
            $content->description('管理');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('项目');
            $content->description('编辑');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('项目');
            $content->description('创建');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Project::class, function (Grid $grid) {

            $grid->model('编号')->orderBy('id', 'desc');
            $grid->name('名称')->editable()->sortable();
            $grid->progress('进度')->editable();
            $grid->status('状态')->editable();
            $grid->type('类型')->editable();
            $grid->category('分类')->editable();
            $grid->created_at('时间')->editable()->sortable();
            $states = [
                'on' => ['value' => 1, 'text' => '显示', 'color' => 'primary'],
                'off' => ['value' => 0, 'text' => '隐藏', 'color' => 'default'],
            ];
            $grid->display('展示状态')->switch($states);

            $grid->filter(function ($filter) {
                $filter->useModal();
                $filter->disableIdFilter();
                $filter->like('name', 'name');
            });

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Project::class, function (Form $form) {

            $form->tab('数据/信息', function ($form) {

                $form->text('name','项目名称')->rules('required');
                $form->text('slug','链接名称')->rules('required');
                $form->text('type','项目类型');
                $form->text('category','项目分类');
                $form->slider('progress','项目进度')->options(['max' => 100, 'min' => 0, 'step' => 0.5, 'postfix' => '%']);
                $form->text('status','项目状态');
                $form->datetime('created_at', '项目日期');
                $form->text('url','项目网址');
                $form->image('image','项目图片')->move('project/Image')->uniqueName();
                $form->textarea('coworker','项目参与人');
                $form->text('copyright', '版权说明');
                $states = [
                    'on' => ['value' => 1, 'text' => '显示', 'color' => 'success'],
                    'off' => ['value' > 0, 'text' => '隐藏', 'color' => 'danger'],
                ];
                $form->switch('display', '展示属性')->states($states)->default(1);

            })->tab('内容图片', function ($form) {

                $form->text('description','项目简介');
                $form->simditor('content','项目内容');

            });

        });
    }
}
