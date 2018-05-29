<?php

namespace App\Http\Controllers;

use App\Log;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Html5Controller extends Controller
{

    public function isMobile()
    {
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
            return true;
        }
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset($_SERVER['HTTP_VIA'])) {
            // 找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        }
        // 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile', 'MicroMessenger');
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return true;
            }
        }
        // 协议法，因为有可能不准确，放到最后判断
        if (isset ($_SERVER['HTTP_ACCEPT'])) {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
                return true;
            }
        }
        return false;
    }

    public function webView(Request $request)
    {
        $url = $request->get('url');
        $title = $request->get('title');
        if ($this->isMobile()) {
            return redirect()->to($request->get('url'));
        }
        return view('html5.webView', compact('url', 'title'));
    }

    public function viewIndex($slug)
    {
        $project = Project::where('display', 1)->where('slug', $slug)->first();
        return view('html5.view.' . $slug . '.index', compact('project'));
    }

    public function auth($slug)
    {
        $project = Project::where('display', 1)->where('slug', $slug)->first();
        if ($project) {
            $count = Log::where('type', $slug)->get()->sum('loginCounts');
            return view('html5.auth', compact('project', 'count'));
        }
        return '没有对应的项目授权页，请检查。';
    }

    public function authCheck($slug, Request $request)
    {
        $project = Project::where('display', 1)->where('slug', $slug)->first();
        $user = User::where('stuId', $request->input('stuId'))->where('name', $request->input('name'))->first();
        if ($user) {
            session(['authId' => $user->stuId]);
            session(['authName' => $user->name]);
            Log::updateOrCreate(['stuId' => $user->stuId, 'type' => $project->slug], ['name' => $user->name, 'loginIP' => $_SERVER["REMOTE_ADDR"]]);
            Log::where('stuId', $user->stuId)->where('type', $project->slug)->increment('loginCounts');
            return redirect()->route('html5.view.main', $project->slug)->with('notify', '授权成功，您的数据报告已生成');
        } else {
            Log::updateOrCreate(['stuId' => '-' . $request->input('stuId')], ['type' => $slug, 'name' => $request->input('name'), 'loginIP' => $_SERVER["REMOTE_ADDR"], 'memo' => '无效账号']);
            return back()->withInput()->with('notify', '你的学号/工号有误或未录入！');
        }
    }

    public function viewMain($slug, Request $request)
    {
        $project = Project::where('display', 1)->where('slug', $slug)->first();
        if ($request->session()->has('authId')) {
            $id = $request->session()->get('authId');
            $name = $request->session()->get('authName');
            if ($slug == 'library2017') {
                $resultDatas = DB::table('libraryResultsDatas')->where('id', $id)->first();
                if (!$resultDatas) {
                    return redirect()->route('html5.auth', $slug)->withInput()->with('notify', '2017，你未在图书馆留下足迹！何谈回忆？');
                };
                $borrowDatas = DB::table('libraryBorrowDatas')->where('id', $id)->first();
                $enterDatas = DB::table('libraryEnterDatas')->where('id', $id)->first();
                $timeDatas = DB::table('libraryTimeDatas')->where('id', $id)->first();
                $relationDatas = DB::table('libraryRelationDatas')->where('id', $id)->orderBy('percent', 'desc')->get();
                $firstEnterData = DB::table('libraryEnterRecords')->where('id', $id)->orderBy('date', 'asc')->orderBy('time', 'asc')->first();
                return view('html5.view.' . $slug . '.main', compact('project', 'borrowDatas', 'resultDatas', 'enterDatas', 'timeDatas', 'relationDatas', 'firstEnterData'));
            } elseif ($slug == 'card2017') {
                $shareUrl = route('html5.auth.share', ['slug' => $slug, 'code' => md5($id . $name)]);
                return view('html5.view.' . $slug . '.main', compact('project', 'id', 'name', 'shareUrl'));
            }
            return '没有匹配的项目视图数据控制器';
        }
        return redirect()->route('html5.view', $slug);
    }


}

