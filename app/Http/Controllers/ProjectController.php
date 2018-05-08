<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::where('display', 1)->latest('created_at')->paginate(6);
        return view('project.index', compact('projects', 'type'));
    }

    public function item($id)
    {
        $project = Project::where('display', 1)->where('id', $id)->first();
        return view('project.show', compact('project'));
    }

    public function viewIndex($slug)
    {
        $project = Project::where('display', 1)->where('slug', $slug)->first();
        return view('project.view.' . $slug . '.index', compact('project'));
    }

    public function auth($slug)
    {
        $project = Project::where('display', 1)->where('slug', $slug)->first();
        if ($project) {
            $count = User::where('loginCounts', '<>', '0')->get()->sum('loginCounts');
            return view('project.auth', compact('project', 'count'));
        }
        return '没有对应的项目授权页，请检查。';
    }

    public function authCheck($slug, Request $request)
    {
        $project = Project::where('display', 1)->where('slug', $slug)->first();
        $user = User::where('stuId', $request->input('stuId'))->where('name', $request->input('name'))->first();
        if ($user) {
            session(['authId' => $user->stuId]);
            User::where('stuId', $user->stuId)->update(['loginIP' => $_SERVER["REMOTE_ADDR"]]);
            User::where('stuId', $user->stuId)->increment('loginCounts');
            return redirect()->route('project.view.main', $project->slug)->with('notify', '授权成功，您的数据报告已生成');
        } else {
            return back()->withInput()->with('notify', '2017，你未在图书馆留下足迹！何谈回忆？');
        }
    }

    public function viewMain($slug, Request $request)
    {
        $project = Project::where('display', 1)->where('slug', $slug)->first();
        if ($request->session()->has('authId')) {
            $id = $request->session()->get('authId');
            if ($slug == 'library2017') {
                $resultDatas = DB::table('libraryResultsDatas')->where('id', $id)->first();
                if (!$resultDatas) {
                    return redirect()->route('project.auth', $slug)->withInput()->with('notify', '2017，你未在图书馆留下足迹！何谈回忆？');
                };
                $borrowDatas = DB::table('libraryBorrowDatas')->where('id', $id)->first();
                $enterDatas = DB::table('libraryEnterDatas')->where('id', $id)->first();
                $timeDatas = DB::table('libraryTimeDatas')->where('id', $id)->first();
                $relationDatas = DB::table('libraryRelationDatas')->where('id', $id)->orderBy('percent', 'desc')->get();
                $firstEnterData = DB::table('libraryEnterRecords')->where('id', $id)->orderBy('date', 'asc')->orderBy('time', 'asc')->first();
                return view('project.view.' . $slug . '.main', compact('project', 'borrowDatas', 'resultDatas', 'enterDatas', 'timeDatas', 'relationDatas','firstEnterData'));
            }
            return '没有匹配的项目视图数据控制器';
        }
        return redirect()->route('project.view', $slug);
    }

}

