<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Model\MediaGroup;
use App\Http\Model\Media;
use Request;

class MediaGroupController extends Controller
{
  var $MediaGroupModel;
  var $mediaPath = "customer/upload/media/";
  public function __construct(){
    $this->MediaGroupModel = new MediaGroup;
  }

  public function lists(Request $request){
    $data = $request::all();
    $arr = MediaGroup::where($data)->get();
    foreach ($arr as $key => $value) {
      $arr[$key]['count'] = Media::where('media_group_id',$value['id'])->count();
    }
    if($arr){
      return $this->RespondSuccessRequest(['result'=>$arr]);
    }
  }


  public function search(Request $request){
    $data = $request::all();

    if($data['keyword']){
      $arr = $this->MediaGroupModel->orWhere('name', 'LIKE', "%".$data['keyword']."%")->paginate();
    }else{
      $arr =  $this->MediaGroupModel->_all();
    }

    if($arr){
      return $this->RespondSuccessRequest(['result'=>$arr]);
    }
  }

  public function add(Request $request){
   $data = $request::all();
    $file = $_FILES['file'];

    if($file['error'] && !isset($data['id'])){
      return $this->RespondBadRequest("Please choose cover image.");
    }

    if(!$data['name']){
      return $this->RespondBadRequest("Please enter name.");
    }

    if(!isset($data['id']) && (MediaGroup::where('name',$data['name'])->count() > 0 || file_exists($this->mediaPath.$data['name']))){
      return $this->RespondBadRequest("The album has duplicate.");
    }


    if(isset($data['id'])){
      $old = MediaGroup::where('id',$data['id'])->select('name','cover')->first();
      if(!$file['error']){
        if($old && file_exists($this->mediaPath.$old['name']."/".$old['cover'])){
          unlink($this->mediaPath.$old['name']."/".$old['cover']);
        }
      }
      if($data['name'] &&  file_exists($this->mediaPath.$old['name'])){
        rename($this->mediaPath.$old['name'], $this->mediaPath.$data['name']);
      }
    }

    if (!file_exists($this->mediaPath.$data['name'])) {
      mkdir($this->mediaPath.$data['name'], 0777, true);
    }

    if(!$file['error']){
      $file_tmp = $file['tmp_name'];
      $type = explode( '/', $file['type'] );
      $type = $type[1];
      $filename = "cover".'.'.$type;
      $file_copy = $this->mediaPath."/".$data['name']."/".$filename;
      move_uploaded_file($file_tmp, $file_copy);
      $data['cover'] = $filename;
    }

    $res =  $this->MediaGroupModel->_add($data);

    if($res){
      return $this->RespondSuccessRequest(['result'=>$res]);
    }else{
      return $this->RespondBadRequest("insert data fails.");
    }
  }

  public function delete(Request $request){
    $data = $request::all();
    $name = MediaGroup::where('id',$data['id'])->select('name')->first()->name;
    if($name && file_exists($this->mediaPath.$name)){
      $dir = $this->mediaPath.$name;
      if(file_exists($dir)){
        $files = array_diff(scandir($dir), array('.','..')); 
        if($files){
          foreach ($files as $file) { 
            @(is_dir("$dir/$file")) ? $this->delTree("$dir/$file") : unlink("$dir/$file"); 
          } 
        }
      }
      rmdir($this->mediaPath.$name);
    }

    $status = $this->MediaGroupModel->_delete($data);
    if($status){
      return $this->RespondSuccessRequest();
    }else{
      return $this->RespondBadRequest("delete data fails.");
    }
  }

}
