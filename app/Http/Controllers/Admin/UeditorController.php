<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UeditorController extends BaseController {

	public function index(Request $request)
	{
		date_default_timezone_set("Asia/chongqing");
		$CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents("../app/Http/Controllers/Admin/ueditor/config.json")), true);
		$action = $request['action'];
		
		switch ($action) {
		    case 'config':
		        $result =  json_encode($CONFIG);
		        break;

		    /* 上传图片 */
		    case 'uploadimage':
		    /* 上传涂鸦 */
		    case 'uploadscrawl':
		    /* 上传视频 */
		    case 'uploadvideo':
		    /* 上传文件 */
		    case 'uploadfile':
		        $result = include("../app/Http/Controllers/Admin/ueditor/action_upload.php");
		        break;

		    /* 列出图片 */
		    case 'listimage':
		        $result = include("../app/Http/Controllers/Admin/ueditor/action_list.php");
		        break;
		    /* 列出文件 */
		    case 'listfile':
		        $result = include("../app/Http/Controllers/Admin/ueditor/action_list.php");
		        break;

		    /* 抓取远程文件 */
		    case 'catchimage':
		        $result = include("../app/Http/Controllers/Admin/ueditor/action_crawler.php");
		        break;

		    default:
		        $result = json_encode(array(
		            'state'=> '请求地址出错'
		        ));
		        break;
		}

		/* 输出结果 */
		if (isset($request["callback"])) {
		    if (preg_match("/^[\w_]+$/", $request["callback"])) {
		        echo htmlspecialchars($request["callback"]) . '(' . $result . ')';
		    } else {
		        echo json_encode(array(
		            'state'=> 'callback参数不合法'
		        ));
		    }
		} else {
		    echo $result;
		}
		
	}

}
