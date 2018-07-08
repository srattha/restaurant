<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Model\MediaGroup;
use App\Http\Model\Media;
use App\Http\Model\Admin;

class ViewController extends Controller
{

	// public $layout_menu = [
	// 	[
	// 		'name'=>'user',
	// 		'link'=>'',
	// 		'icon'=>'icon-meter-fast'
	// 	],
	// 	[
	// 		'name'=>'Media',
	// 		'link'=>'media_group',
	// 		'icon'=>'icon-images3'
	// 	],
	// 	[
	// 		'name'=>'Content',
	// 		'link'=>'content',
	// 		'icon'=>'icon-gift'
	// 	],
	// 	[
	// 		'name'=>'Emergency',
	// 		'link'=>'emergency',
	// 		'icon'=>'icon-warning22'
	// 	],
	// 	[
	// 		'name'=>'Layout',
	// 		'link'=>'layout',
	// 		'icon'=>'icon-copy'
	// 	],
	// 	[
	// 		'name'=>'Device',
	// 		'link'=>'device',
	// 		'icon'=>'icon-display'
	// 	],
	// 	[
	// 		'name'=>'Schedule',
	// 		'link'=>'schedule',
	// 		'icon'=>'glyphicon glyphicon-calendar'
	// 	],
	// 	[
	// 		'name'=>'User Account',
	// 		'link'=>'admin',
	// 		'icon'=>'icon-user-lock'
	// 	],
	// 	[
	// 		'name'=>'Monitor',
	// 		'link'=>'monitor',
	// 		'icon'=>'icon-terminal'
	// 	]
	// ];

	public function __construct()
	{
		// $this->middleware('auth', ['except' => ['view_device', 'view_device_layout']]);
		// view()->share('layout_menu', $this->layout_menu);
	}

	
	public function media_group()
	{
		return view('media.media_group');
	}
	
	public function media()
	{
		$media_group_id = $_GET['media_group_id'];
		$media_group = MediaGroup::where('id',$media_group_id)->first();
		if($media_group){
			return view('media.media',array("media_group"=>$media_group));
		}else{
			return ["error"=>true, "message"=>"404 NOT FOUND"];
		}
	}


	public function profile($id = NULL)
	{
		$arr = null;
		if($id){
			$arr = Admin::where('id',$id)->first();
			if($arr){
				$arr['image_file'] = "/customer/upload/admin/".$arr['image_file'];
			}
		}

		return view('admin.profile', ["data"=>$arr]);
	}
}
