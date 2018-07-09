
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
 <div style="padding: 10px;">
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>ชื่อ</th>
          <th>อีเมล</th>
          <th>ระดับ</th>
          <th>Status</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Eugene</td>
          <td>Kopyov</td>
          <td>ผู้ใช้</td>
          <td><span class="label label-success">อนุญาต</span></td>
          <td class="text-center">
            <a href="#"><i class="icon-pencil7"></i> แก้ไข</a>
            <a href="#"><i class="icon-bin"></i>ลบ</a>
            <!-- <ul class="icons-list">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-menu9"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                 <li><a href="#"><i class="icon-pencil7"></i> แก้ไข</a></li>
                 <li><a href="#"><i class="icon-bin"></i>ลบ</a></li>
               </ul>
             </li>
           </ul> -->
         </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Victoria</td>
          <td>Baker</td>
          <td>ผู้ดูแลระบบ</td>
          <td><span class="label label-danger">ไม่อนุญาต</span></td>
          <td class="text-center">
             <a href="#"><i class="icon-pencil7"></i> แก้ไข</a>
            <a href="#"><i class="icon-bin"></i>ลบ</a>
         </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>

@endsection
@section('javascript')

@endsection
