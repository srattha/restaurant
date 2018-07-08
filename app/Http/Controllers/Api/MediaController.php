<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Model\Campaign;
use App\Http\Model\Media;
use App\Http\Model\MediaGroup;
use Request;

class MediaController extends Controller
{
  var $MediaModel;
  var $mediaPath = "customer/upload/media/";

  public function __construct(){
    $this->MediaModel = new Media;
  }

  public function lists(Request $request){
    $data = $request::all();
    $arr =  Media::where($data)->orderBy('id','desc')->get();

    if($arr){
      return $this->RespondSuccessRequest(['result'=>$arr]);
    }
  }


  public function search(Request $request){
    $data = $request::all();

    if($data['keyword']){
      $arr = $this->MediaModel->orWhere('name', 'LIKE', "%".$data['keyword']."%")->paginate();
    }else{
      $arr =  $this->MediaModel->_all();
    }

    if($arr){
      return $this->RespondSuccessRequest(['result'=>$arr]);
    }
  }

  public function addImage(Request $request){
     $data = $request::all();
    $file = $_FILES['image'];
    foreach ($file['name'] as $key => $value) {
      if(!$file[$key]['error']){
        $file_tmp = $file['tmp_name'][$key];
        $type = explode( '/', $file['type'][$key] );
        $type = $type[1];
        $code_name = $this->generateSerialCode();
        $filename = $code_name.'.'.$type;
        $file_copy = $this->mediaPath."/".$data['name']."/".$filename;
        move_uploaded_file($file_tmp, $file_copy);
        
        $arr = [
          "media_group_id"=>$data['media_group_id'],
          "type"=>"image",
          "cover"=>$filename,
          "name"=>$filename,
        ];

        $this->MediaModel->_add($arr);
      }
    }
    return $this->RespondSuccessRequest(['result'=>true]);
  }

  public function addVideo(Request $request){
    $data = $request::all();
    $file = $_FILES['video'];

      if(!$file['error']){
        $file_tmp = $file['tmp_name'];
        $type = explode( '/', $file['type'] );
        $type = $type[1];
        $code_name = $this->generateSerialCode();
        $filename = $code_name.'.'.$type;
        $file_copy = $this->mediaPath."/".$data['name']."/".$filename;
        move_uploaded_file($file_tmp, $file_copy);
        
        $cover = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data['cover']));
        $cover_name = $code_name.'-cover.jpg';
        file_put_contents($this->mediaPath."/".$data['name']."/".$cover_name, $cover);

        $arr = [
        "media_group_id"=>$data['media_group_id'],
        "type"=>"video",
        "cover"=>$cover_name,
        "name"=>$filename,
        ];

        $this->MediaModel->_add($arr);
      }
    
    return $this->RespondSuccessRequest(['result'=>true]);
  }

  public function delete(Request $request){
    $data = $request::all();
    $name = MediaGroup::where('id',$data['media_group_id'])->select('name')->first()->name;
    $filename = Media::where('id',$data['id'])->select('name')->first()->name;
    if($name && $filename && file_exists($this->mediaPath.$name."/".$filename)){
      unlink($this->mediaPath.$name."/".$filename);
    }

    $status = $this->MediaModel->_delete($data);
    if($status){
      return $this->RespondSuccessRequest();
    }else{
      return $this->RespondBadRequest("delete data fails.");
    }
  }

}
