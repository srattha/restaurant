
@extends('admin.master')

@section('content')
<div class="panel" ng-controller="DeviceController">
  <div class="panel-heading bg-primary">
    <h1 class="panel-title text-semibold">แสดงรายการ ยอดรวม</h1>
    <div class="heading-elements">
     <!-- <button class="btn bg-cakebox-2" ng-click="modaldevicelog()"><i class="icon-plus-circle2"></i> Devicelog</button> -->
   </div>
 </div>
 <div class="row" style="padding: 10px;">
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>วันที่</th>
          <th>โต๊ะ</th>
          <th>รายการอาหาร</th>
          <th>ยอดรวม</th>
          <th>สถานะ</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>7/6/2018</td>
          <td>1</td>
          <td>
            <p>ต้มยำกุ่ง 80 บาท</p>
            <p>ลาบ 60 บาท</p>
            <p>เบียลิโอ 80 บาท</p>
          </td>
          <td>220 บาท</td>
          <td><span class="label bg-success heading-text">จ่ายแล้ว</span></td>
        </tr>
        <tr>
          <td>2</td>
          <td>7/6/2018</td>
          <td>2</td>
          <td>
            <p>ต้ำแซบ 80 บาท</p>
            <p>ส้มตำไทย 50 บาท</p>
            <p>ข้าวเหนียว 40 บาท</p>
            <p>น้ำเปล่า 40 บาท</p>
          </td>
          <td>170 บาท</td>
          <td><span class="label bg-danger-400 heading-text">ยังไม่ได้จ่าย</span></td>
        </tr>
        <tr>
          <td>3</td>
          <td>7/6/2018</td>
          <td>3</td>
          <td>
            <p>ต้มยำปลา 80 บาท</p>
            <p>ลาบ 60 บาท</p>
            <p>เบียช้าง 70 บาท</p>
            <p>น้ำแข็ง 20 บาท</p>
          </td>
          <td>230 บาท</td>
          <td><span class="label bg-danger-400 heading-text">ยังไม่ได้จ่าย</span></td>
        </tr>
      </tbody>
    </table>
  </div>
  
</div>





</div>

@endsection
@section('javascript')

@endsection
