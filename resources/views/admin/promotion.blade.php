
@extends('admin.master')

@section('content')
<div class="panel" ng-controller="DeviceController">
  <div class="panel-heading bg-primary">
    <h1 class="panel-title text-semibold">โปรโมชั่น</h1>
    <div class="heading-elements">
     <!-- <button class="btn bg-cakebox-2" ng-click="modaldevicelog()"><i class="icon-plus-circle2"></i> Devicelog</button> -->
     <button class="btn bg-slate-800" ng-click="modal()"><i class="icon-plus-circle2"></i> เพิ่ม</button>
   </div>
 </div>
 <div class="row" style="padding: 10px;">
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="/img/2.jpg" alt="Boats at Phi Phi, Thailand">
      <div class="caption">
        <p>ต้มยำกุ้ง</p>
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="/img/2.jpg" alt="Boats at Phi Phi, Thailand">
      <div class="caption">
        <p>ต้มยำกุ้ง</p>
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="/img/2.jpg" alt="Boats at Phi Phi, Thailand">
      <div class="caption">
        <p>ต้มยำกุ้ง</p>
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="/img/2.jpg" alt="Boats at Phi Phi, Thailand">
      <div class="caption">
        <p>ต้มยำกุ้ง</p>
      </div>
    </div>
  </div>
</div>





</div>

@endsection
@section('javascript')

@endsection
