<?php

namespace App\Http\Model;
use Schema;

use Illuminate\Database\Eloquent\Model;

class base extends Model
{
  var $columnList = [];
  var $pkey = "id"; 
  var $orderBy = "asc"; 

  function __construct(){
    $table = $this->getTable();
    $this->columnList =  Schema::getColumnListing($table);
  }

  function _all($_option=NULL){
    $option = [];

    //check json array column and check data empty
    if($this->columnList){
      foreach ($this->columnList as $key => $value) {
        if(isset($_option[$value])){
          $option[$value] = $_option[$value];
        }
      }
    }
    //condition query data [lists,view]
    if(isset($option[$this->pkey])){
      return $this->where($option)->first();
    }else if($option){
      // return $this->where($option)->orderBy($this->pkey,$this->orderBy)->paginate(15);
      return $this->where($option)->orderBy($this->pkey,$this->orderBy)->get();
    }else{
      // return $this->orderBy($this->pkey,$this->orderBy)->paginate(15);
      return $this->orderBy($this->pkey,$this->orderBy)->get();
    }
  }

  function _add($_option=NULL){
    $option = [];

    //check json array column and check data empty
    if($this->columnList){
      foreach ($this->columnList as $key => $value) {
        if(isset($_option[$value])){
          $option[$value] = $_option[$value];
        }
      }
    }

    if($option[$this->pkey]){
      $update = $this->where($this->pkey, $option[$this->pkey]);
      $update->update($option);
      return $option[$this->pkey];
    }else{
      return $this->insertGetId($option);
    }
  }

  public function _delete($_option = NULL) {

    $option = [];
    //check json array column and check data empty
    if($this->columnList){
      foreach ($this->columnList as $key => $value) {
        if(isset($_option[$value])){
          $option[$value] = $_option[$value];
        }
      }
    }

    if ($option) {
      if($this->where($option)->delete()){
        return 1;
      }
    }
  }
}
