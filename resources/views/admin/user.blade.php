
@extends('admin.master')

@section('content')
<div class="panel" ng-controller="DeviceController">
  <div class="panel-heading bg-primary">
    <h1 class="panel-title text-semibold">จัดการสมาชิก</h1>
    <div class="heading-elements">
     <!-- <button class="btn bg-cakebox-2" ng-click="modaldevicelog()"><i class="icon-plus-circle2"></i> Devicelog</button> -->
     <button class="btn bg-slate-800" ng-click="modal()"><i class="icon-plus-circle2"></i> เพิ่ม</button>
   </div>
 </div>
 <div class="row" style="padding: 10px;">
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Username</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Eugene</td>
          <td>Kopyov</td>
          <td>@Kopyov</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Victoria</td>
          <td>Baker</td>
          <td>@Vicky</td>
        </tr>
        <tr>
          <td>3</td>
          <td>James</td>
          <td>Alexander</td>
          <td>@Alex</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Franklin</td>
          <td>Morrison</td>
          <td>@Frank</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>






</div>

@endsection
@section('javascript')

@endsection
