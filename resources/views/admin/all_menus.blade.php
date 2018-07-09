
@extends('admin.master')

@section('content')
<div class="panel" ng-controller="DeviceController">
  <div class="panel-heading bg-primary">
    <h1 class="panel-title text-semibold">เมนูอาหารทั้งหมด</h1>
    <div class="heading-elements">
     <!-- <button class="btn bg-cakebox-2" ng-click="modaldevicelog()"><i class="icon-plus-circle2"></i> Devicelog</button> -->
     <button class="btn bg-slate-800" ng-click="modal()"><i class="icon-plus-circle2"></i> เพิ่ม</button>
   </div>
 </div>
 <div style="padding: 10px;">
   <div class="table-responsive">
     <table class="table table-striped media-library table-lg">
      <thead>
        <tr>
          <th>รูป</th>
          <th>ชื่อ</th>
          <th>ราคา</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <td>
            <a href="/img/2.jpg" data-popup="lightbox">
              <img src="/img/2.jpg" alt="" class="img-rounded img-preview">
            </a>
          </td>
          <td>ต้มยำกุ่ง</td>
          <td>80 บาท </td>
          <td class="text-center">
            <ul class="icons-list">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-menu9"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                 <li><a href="#"><i class="icon-pencil7"></i> แก้ไข</a></li>
                 <li><a href="#"><i class="icon-bin"></i>ลบ</a></li>
               </ul>
             </li>
           </ul>
         </td>
       </tr>
       <tr>
        <td>
          <a href="/img/2.jpg" data-popup="lightbox">
            <img src="/img/2.jpg" alt="" class="img-rounded img-preview">
          </a>
        </td>
        <td>ต้มยำกุ่ง</td>
        <td>80 บาท </td>
        <td class="text-center">
          <ul class="icons-list">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-menu9"></i>
              </a>

              <ul class="dropdown-menu dropdown-menu-right">
               <li><a href="#"><i class="icon-pencil7"></i> แก้ไข</a></li>
               <li><a href="#"><i class="icon-bin"></i>ลบ</a></li>
             </ul>
           </li>
         </ul>
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
