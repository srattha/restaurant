<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Http\Model\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Request;

class AdminController extends Controller
{
  var $path_img = "customer/upload/admin/";
  var $adminMode;

  public function __construct(){
   // parent::__construct();
    $this->adminMode = new Admin;
  }

  public function lists(Request $request){
     $data = $request::all();
    // $arr =  $this->adminMode->_all($data);
    $arr = Admin::where($data)->get();

    if($arr){
     foreach ($arr as $key => $value) {
      $arr[$key]['image_file'] = "/".$this->path_img.$value['image_file'];
    }
  }

  if($arr){
    return $this->RespondSuccessRequest(['result'=>$arr]);
  }
}

public function view(Request $request){
  $data = $request::all();
  $arr = Admin::where(['id'=>'1'])->first();
  if($arr){
    $arr['image_file'] = "/".$this->path_img.$arr['image_file'];
    return $this->RespondSuccessRequest(['result'=>$arr]);
  }
}  

public function updateProfile(Request $request){
  $data = $request::all();

  $res =  $this->adminMode->where(['id'=>$data['id']])->first();

  /*check old file unlink and upload new file*/
  if($res){
    if($_FILES['image_file']['name']){
      if($res->image_file){
        @unlink($this->path_img.$res->image_file);
      }      

      $data["image_file"]=$this->uploadFile($_FILES['image_file'],$this->path_img);
    }else{
      unset($data["image_file"]);
    }

    $res =  $this->adminMode->_add($data);

    if($res){
      return $this->RespondSuccessRequest(['result'=>$res]);
    }else{
      return $this->RespondBadRequest("Update data fails.");
    }
  }else{
    return $this->RespondBadRequest("Update data fails.");
  }
}

 public function update_status(Request $request){
      $data = $request::all();
     $res =  $this->adminMode->where('id',$data['id'])->update(["active"=>$data['active']]);
     if($res){ 
        return $this->RespondSuccessRequest(['result'=>$res]);
      }else{
        return $this->RespondBadRequest("update_status data fails.");
      }
    }

public function changePassword(Request $request){
 $data = $request::all();
 if($data['password']){
  $data['password'] = Hash::make($data['password']);
  $res =  $this->adminMode->_add($data);

  if($res){
    return $this->RespondSuccessRequest(['result'=>$res]);
  }else{
    return $this->RespondBadRequest("Chnage password fails.");
  }   
}else{
  return $this->RespondBadRequest("Chnage password fails.");

}
}

public function add(Request $request){
  $data = $request::all();
  unset($data['image_file']);
  /*send email to amdin account */
  // $EmailController = new EmailController;
  // $EmailController->admin_email($data);

  $data['password'] = Hash::make($data['password']);
  $res =  $this->adminMode->_add($data);

  if($res){
    return $this->RespondSuccessRequest(['result'=>$res]);
  }else{
    return $this->RespondBadRequest("insert data fails.");
  }
}

public function delete(Request $request){
  $data = $request::all();
  $status =  $this->adminMode->_delete($data);

  if($status){
    return $this->RespondSuccessRequest();
  }else{
    return $this->RespondBadRequest("delete data fails.");
  }
}





}
