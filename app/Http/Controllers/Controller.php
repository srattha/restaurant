<?php

namespace App\Http\Controllers;
error_reporting( E_ALL );
error_reporting(E_ALL & ~E_NOTICE);

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Response;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


  public function RespondBadRequest($message){
    return Response::json([
      'error' => true,
      'title' => 'MDW Error',
      'message' => $message,
      'status' => "400 Bad Request"
      ], 400);
  }
   public function Response($status = NULL, $message = NULL, $data = NULL){
      return $status = ["status"=>$status, "message"=>$message, "data"=>$data];
    }
  public function RespondSuccessRequest($arr=NULL){
    $data = [
    'status' => true,
    'message' => $arr['message']?$arr['message']:"success",
    'parameter' => $arr['parameter']?$_POST:$_POST,
    'result' => $arr['data']?$arr['data']:""
    ];

    if($arr){
      $data = array_merge($data,$arr);
    }
    return Response::json($data, 200);
  }

  public function makeSearch($data){
    $search = [];
    foreach ($data as $key => $value) {
      if($value){
        $search[$key] = $value;
      }
    }
    return $search;
  }


  function __arrayUnset($arr = NULL) {
    if ($arr) {
      foreach ($arr as $key => $value) {
        if (!$value) {
          unset($arr[$key]);
        }
      }
    }
    return $arr;
  } 

  // function __randomString($length = 5, $string = "string") {
  //   if ($string === "string") {
  //     $STRING = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  //   } else {
  //     $STRING = "ABCDEFGHIJKLMNOPQRSTUVWXYZ23456789";
  //   }
  //   return substr(str_shuffle($STRING), 0, $length);
  // }

  

 

  

  function uploadFile($files=NULL,$path_file=NULL){
    if($files && $path_file){
      $file = array();
      $fileName_tmp = $files['name'];
      $tmp_name = $files['tmp_name'];
      @$type = end(explode('.',$fileName_tmp));
      $fileName = $this->generateSerialCode().".".$type;
      $path = $path_file.$fileName;

      if(move_uploaded_file($tmp_name,$path)){
        return $fileName;
      }
    }
  }

}
