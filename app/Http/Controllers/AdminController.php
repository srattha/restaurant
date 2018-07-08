<?php

namespace App\Http\Controllers;
use App\Http\Model\MediaGroup;
use App\Http\Model\Media;

class AdminController extends Controller
{



	public function __construct()
	{

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

	public function recommended_menu(){

		return view('admin.recommended-menu');
	}
	public function user(){
		return view('admin.user');
	}
	public function promotion(){
		return view('admin.promotion');
	}
	public function reservations_table(){
		return view('admin.reservations_table');
	}
	public function table(){
		return view('admin.table');
	}

	 public function report(){
        return view('admin.report');
    }


}
