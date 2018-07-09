<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Request;

class UsersController extends Controller
{

  public function __construct(){
    $this->MediaUser = new User;
  }

  public function lists(Request $request){
    $data = $request::all();
    $arr = User::where($data)->get();

    if($arr){
      return $this->RespondSuccessRequest(['result'=>$arr]);
    }
  }

  public function add(Request $request){
    $data = $request::all();

    $arr=[
      'email'=>$data['email'],
      'name'=>$data['name'],
      'users_type_id'=>$data['users_type_id'],
      'password' => bcrypt($data['password']),

    ];

    if(isset($data['id'])){
      $update_user = User::where('id',$data['id'])->update($arr);
      if($update_user){
        return $this->Response(true, "success", $update_user);
      }else{
        return $this->Response(false, "error message..");
      }
    }
    $add_user = User::insertGetId($arr);

    if($add_user){
      return $this->Response(true, "success", $add_user);
    }else{
      return $this->Response(false, "error message..");
    }

     }

}
