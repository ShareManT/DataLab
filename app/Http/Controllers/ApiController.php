<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

    public function DataApi($slug, Request $request)
    {
        if ($slug == 'MealCard') {
            $timeStart = microtime(true);
            $schoolData = [
                'totalResume' => '369685224.65',
                '1MonthResume' => '1772539.00',
                '2MonthResume' => '2404556.48',
                '3MonthResume' => '7342115.53',
                '4MonthResume' => '6339313.02',
                '5MonthResume' => '6417999.14',
                '6MonthResume' => '5230633.21',
                '7MonthResume' => '963338.57',
                '8MonthResume' => '1279879.92',
                '9MonthResume' => '8607573.08',
                '10MonthResume' => '6877599.41',
                '11MonthResume' => '8159664.64',
                '12MonthResume' => '7097337.80'
            ];
            $heatMap = [
                'min' => [
                    '7:40:00' => '二楼大窗口(1)',
                    '7:45:00' => '面包(2)',
                    '7:50:00' => '六食堂(1)',
                    '7:55:00' => '爱转角水果(2)',
                    '8:00:00' => '兜兜转转(1)',
                    '8:05:00' => '兜兜转转(1)',
                    '8:10:00' => '六食堂(1)',
                    '8:15:00' => '肥肠粉(2)',
                    '8:20:00' => '兜兜转转(1)',
                    '8:25:00' => '兜兜转转(1)',
                    '11:35:00' => '2楼新窗口二(2)',
                    '11:40:00' => '1楼新窗口(4)',
                    '11:45:00' => '黑鹿咖啡厅(3)',
                    '11:50:00' => '黑鹿咖啡厅(5)',
                    '11:55:00' => '黑鹿咖啡厅(10)',
                    '12:00:00' => '黑鹿咖啡厅(8)',
                    '12:05:00' => '2楼新窗口二(4)',
                    '12:10:00' => '黑鹿咖啡厅(7)',
                    '17:35:00' => '1楼新窗口(1)',
                    '17:40:00' => '1楼新窗口(1)',
                    '17:45:00' => '2楼新窗口二(5)',
                    '17:50:00' => '1楼新窗口(9)',
                    '17:55:00' => '1楼新窗口(3)',
                    '18:00:00' => '1楼新窗口(6)',
                    '18:05:00' => '2楼新窗口二(2)'
                ],
                'max' => [
                    '7:40:00' => '一食堂(15813)',
                    '7:45:00' => '一食堂(22929)',
                    '7:50:00' => '一食堂(25392)',
                    '7:55:00' => '一食堂(34514)',
                    '8:00:00' => '四食堂(40778)',
                    '8:05:00' => '四食堂(51463)',
                    '8:10:00' => '四食堂(53137)',
                    '8:15:00' => '四食堂(38693)',
                    '8:20:00' => '四食堂(25513)',
                    '8:25:00' => '四食堂(20158)',
                    '11:35:00' => '四食堂(24885)',
                    '11:40:00' => '四食堂(28576)',
                    '11:45:00' => '四食堂(30086)',
                    '11:50:00' => '一食堂(42304)',
                    '11:55:00' => '一食堂(63161)',
                    '12:00:00' => '四食堂(72226)',
                    '12:05:00' => '四食堂(55581)',
                    '12:10:00' => '四食堂(39090)',
                    '17:35:00' => '四食堂(30563)',
                    '17:40:00' => '四食堂(25489)',
                    '17:45:00' => '四食堂(26817)',
                    '17:50:00' => '四食堂(34845)',
                    '17:55:00' => '四食堂(27895)',
                    '18:00:00' => '四食堂(22597)',
                    '18:05:00' => '四食堂(21826)'
                ]
            ];
            $personResultData = DB::table('MealCardPersonResult')->where('id', $request->get('id'))->where('name', $request->get('name'))->first();
            $personMonthData = DB::table('MealCardPersonMonth')->select('month', 'money')->where('id', $request->get('id'))->where('name', $request->get('name'))->get();
            $personBreakfast = DB::table('MealCardBreakfast')->select('site', 'count')->where('id', $request->get('id'))->where('name', $request->get('name'))->get();
            $personBrunch = DB::table('MealCardBrunch')->select('site', 'count')->where('id', $request->get('id'))->where('name', $request->get('name'))->get();
            $personLunch = DB::table('MealCardLunch')->select('site', 'count')->where('id', $request->get('id'))->where('name', $request->get('name'))->get();
            $personAfternoon = DB::table('MealCardAfternoon')->select('site', 'count')->where('id', $request->get('id'))->where('name', $request->get('name'))->get();
            $personDinner = DB::table('MealCardDinner')->select('site', 'count')->where('id', $request->get('id'))->where('name', $request->get('name'))->get();
            $personNight = DB::table('MealCardNight')->select('site', 'count')->where('id', $request->get('id'))->where('name', $request->get('name'))->get();
            $executeTime = microtime(true) - $timeStart;
            if ($personResultData) {
                $json = [
                    "status" => 'success',
                    "msg" => "接口数据获取成功!",
                    "time" => $executeTime.'s',
                    "data" =>
                        [
                            'school' =>
                                [
                                    'monthTotalResume' => $schoolData,
                                    'heatMap' => $heatMap
                                ],
                            'person' =>
                                [
                                    'result' => $personResultData,
                                    'monthTotalResume' => $personMonthData,
                                    'personBreakfast' => $personBreakfast,
                                    'personBrunch' => $personBrunch,
                                    'personLunch ' => $personLunch,
                                    'personAfternoon' => $personAfternoon,
                                    'personDinner' => $personDinner,
                                    'personNight' => $personNight
                                ]
                        ]
                ];
                return response()->json($json);
            } else {
                $json = [
                    "status" => 'fail',
                    "msg" => "不存在该用户信息，接口无法返回数据!",
                ];
                return response()->json($json);
            }
        }
        return '暂无对应数据接口';
    }

}
