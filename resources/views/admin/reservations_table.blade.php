
@extends('admin.master')

@section('css')
<style type="text/css">
.switchery {
  background-color: #F44336 !important;
}
td{
  text-align: center;
}
th{
  text-align: center;
}
</style>
@endsection

@section('content')
<div ng-controller="ReservationsController">
  <div class="panel" >
    <div class="panel-heading bg-primary">
      <h1 class="panel-title text-semibold">แสดงรายการ การจองโต็ะ</h1>
      <div class="heading-elements">
       <!-- <button class="btn bg-cakebox-2" ng-click="modaldevicelog()"><i class="icon-plus-circle2"></i> Devicelog</button> -->
     </div>
   </div>
   <div class="row" style="padding: 10px;">
    <div class="col-xs-6 col-md-3">
      <div class="thumbnail">
        <div class="row">
          <div class="col-md-4">
           <img src="/img/true.png" style="width: 100%;">
         </div>
         <div class="col-md-8">
          <span class="label bg-success heading-text">ว่าง</span>
        </div>
      </div>
      <img src="/img/table.png">
      <div class="caption">
       <p>โต๊ะ: 2</p>
       <p>จำนวนที่นั่ง: 2</p>
     </div>
     <div><button type="button" class="btn btn-primary btn-block" disabled>ยืนยันสถานะ</button></div>
   </div>
 </div>
 <div class="col-xs-6 col-md-3">
  <div class="thumbnail">
    <div class="row">
      <div class="col-md-4">
       <img src="/img/true.png" style="width: 100%;">
     </div>
     <div class="col-md-8">
      <span class="label bg-success heading-text">ว่าง</span>
    </div>
  </div>
  <img src="/img/table.png">
  <div class="caption">
   <p>โต๊ะ: 3</p>
   <p>จำนวนที่นั่ง: 4</p>
 </div>
 <div><button type="button" class="btn btn-primary btn-block" disabled>ยืนยันสถานะ</button></div>
</div>
</div>
<div class="col-xs-6 col-md-3">
  <div class="thumbnail">
    <div class="row">
      <div class="col-md-4">
       <img src="/img/false.png" style="width: 100%;">
     </div>
     <div class="col-md-8">
      <span class="label bg-danger-400 heading-text">ไม่ว่าง</span>
    </div>
  </div>
  <img src="/img/table.png">
  <div class="caption">
   <p>โต๊ะ: 4</p>
   <p>จำนวนที่นั่ง: 6</p>
 </div>
 <div><button type="button" class="btn btn-primary btn-block">ยืนยันสถานะ</button></div>
</div>
</div>
<div class="col-xs-6 col-md-3">
  <div class="thumbnail">
    <div class="row">
      <div class="col-md-4">
       <img src="/img/false.png" style="    width: 100%;">
     </div>
     <div class="col-md-8">
       <span class="label bg-danger-400 heading-text">ไม่ว่าง</span>
     </div>
   </div>
   <img src="/img/table.png" alt="Boats at Phi Phi, Thailand">
   <div class="caption">
     <p>โต๊ะ: 5</p>
     <p>จำนวนที่นั่ง: 8</p>
   </div>
   <div><button type="button" class="btn btn-primary btn-block" ng-click="modal()">ยืนยันสถานะ</button></div>
 </div>
</div>
</div>

<div id="form" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" data-dismiss="modal" class="close">×</button>
        <h5 class="modal-title">รายการอาหาร โต๊ะ 5</h5>
      </div>
      <div class="modal-body">
        <div>
          <label><b>วันที่:</b> 07/06/2018</label>
        </div>
        <div>
          <label><b>ชื่อ:</b> คนจอง</label>
        </div>
        <div>
          <label><b>โต๊ะ:</b> 5</label>
        </div>
        <div>
          <label><b>จำนวนที่นั่ง:</b> 5</label>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th><h5>ลำดับ</h5></th>
                <th><h5>รายการ (ชนิด/ชื่อ)</h5></th>
                <th><h5>จำนวน</h5></th>
                <th><h5>ราคาต่อหน่วย</h5></th>
                <th><h5>จำนวนเงิน</h5></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>
                  <p>ต้มยำกุ่ง</p>
                  
                </td>
                <td>1</td>
                <td>80 บาท</td>
                <td>80 บาท</td>
              </tr>
              <tr>
                <td>2</td>
                <td>
                  <p>ลาบหมู</p>
                  
                </td>
                <td>1</td>
                <td>80 บาท</td>
                <td>80 บาท</td>
              </tr>
              <tr>
                <td>3</td>
                <td>
                  <p>น้ำเปล่า</p>
                  
                </td>
                <td>2</td>
                <td>10 บาท</td>
                <td>20 บาท</td>
              </tr>
              <tr >
                <td colspan="4"> <div style="text-align: center;"><h5>รวม</h5></div></td>
                <td>180 บาท</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <div>
            <label>
            <input type="checkbox" ng-model="form.active" ng-change="myFunc(form.active)" ng-true-value="1" ng-false-value="0" /> <span ng-if="active == 0" class="label bg-danger-400 heading-text">ยังไม่ได้จ่าย</span>
            <span ng-if="active == 1" class="label bg-success heading-text">จ่ายแล้ว</span>
          </label>
        </div>
      
        <button type="button" data-dismiss="modal" class="btn btn-link"> <i class="icon-cross2"></i> ยกเลิก</button>
        <button type="submit" class="btn  bg-slate-800" ng-disabled="active == 0"> <i class="icon-floppy-disk"></i> ยืนยัน</button>
      </div>

    </div>
  </div>
</div>
</div>
</div>


@endsection
@section('script')
<script type="text/javascript" src="{{ asset('assets/js/angular/controller/ReservationsController.js') }}"></script>
@endsection
