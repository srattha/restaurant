@extends('admin.master')

@section('content')
<div ng-controller="UsersController">
  <div class="panel">
    <div class="panel-heading bg-primary">
      <h1 class="panel-title text-semibold">จัดการข้อมูลสมาชิก</h1>
      <div class="heading-elements">
        <div class="btn-group">
          <!-- <button type="button" class="btn btn-primary " data-toggle="dropdown">Dropdown <span class="caret"></span></button> -->
          <button class="btn bg-slate-800 dropdown-toggle"  data-toggle="dropdown"><i class="icon-plus-circle2"></i> เพิ่ม</button>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="javascript:void(0)" ng-click="modal(2)"><i class=" icon-user-plus"></i>ผู้ดูแลระบบ</a></li>
            <li><a href="javascript:void(0)" ng-click="modal(1)"><i class="icon-users"></i>ลูกค้า</a></li>
            <li><a href="javascript:void(0)" ng-click="modal(3)"><i class="icon-user"></i>แม่ครัวพ่อครัว</a></li>
            <li><a href="javascript:void(0)" ng-click="modal(4)"><i class="icon-user-tie"></i>ผู้จัดการ</a></li>
          </ul>
        </div>

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
           <!--  <a href="#"><i class="icon-pencil7"></i> แก้ไข</a>
            <a href="#"><i class="icon-bin"></i>ลบ</a> -->
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

<div id="form_customer" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" data-dismiss="modal" class="close">×</button>
        <h5 class="modal-title">เพิ่มผู้ใช้ประเภทลูกค้า</h5>
      </div>
      <div class="modal-body">
       <div class="modal-body">
        <div class="form-group">
          <label for="user">ชื่อ</label>
          <input type="text" class="form-control" ng-model="name" placeholder="ชื่อ" name="email">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" ng-model="email" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          <label for="pwd">รหัสผ่าน:</label>
          <input type="password" ng-model="password" class="form-control" placeholder="รหัสผ่าน" name="pwd">
        </div>
        <div class="form-group">
          <label for="pwd">ยืนยังรหัสผ่าน:</label>
          <input type="password" ng-model="form.confirm_password" class="form-control" placeholder="ยืนยังรหัสผ่าน" name="pwd">
        </div>

        <div class="form-group">
          <label>
            <input type="checkbox" ng-model="form.active_user" ng-true-value="1" ng-false-value="0" /> <span ng-if="active_user == 0" class="label bg-danger-400 heading-text">อนุญาต</span>
            <span ng-if="active_user == 1" class="label bg-success heading-text">ไม่อนุญาต</span>
          </label>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" data-dismiss="modal" class="btn btn-link"> <i class="icon-cross2"></i> ยกเลิก</button>
      <button type="button" ng-click="submit(form)"class="btn  bg-slate-800"> <i class="icon-floppy-disk"></i> ยืนยัน</button>
    </div>
  </div>
</div>
</div>


<div id="form_admin" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <form ng-submit="submit_admin(form)">
        <div class="modal-header bg-primary">
          <button type="button" data-dismiss="modal" class="close">×</button>
          <h5 class="modal-title">เพิ่มผู้ใช้ประเภทผู้ดูแลระบบ</h5>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="user">ชื่อ</label>
            <input type="text" class="form-control" ng-model="form.name" placeholder="ชื่อ" name="email">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" ng-model="form.email" placeholder="Enter email" name="email">
          </div>
          <div class="form-group">
            <label for="pwd">รหัสผ่าน:</label>
            <input type="password" class="form-control" ng-model="form.password" placeholder="รหัสผ่าน" name="pwd">
          </div>
          <div class="form-group">
            <label >ยืนยังรหัสผ่าน:</label>
            <input type="password" class="form-control" ng-model="form.confirm_password" placeholder="ยืนยังรหัสผ่าน" name="pwd">
          </div>

          <div class="form-group">
            <label>
              <input type="checkbox" ng-model="form.active_admin" ng-true-value="1" ng-false-value="0" /> อนุญาตใช้
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-link"> <i class="icon-cross2"></i> ยกเลิก</button>
          <button type="submit" class="btn  bg-slate-800"> <i class="icon-floppy-disk"></i> ยืนยัน</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="form_kitchen" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" data-dismiss="modal" class="close">×</button>
        <h5 class="modal-title">เพิ่มผู้ใช้ประเภท ทำครัว</h5>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="user">ชื่อ</label>
          <input type="text" class="form-control" placeholder="ชื่อ" name="email">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          <label for="pwd">รหัสผ่าน:</label>
          <input type="password" class="form-control" placeholder="รหัสผ่าน" name="pwd">
        </div>
        <div class="form-group">
          <label for="pwd">ยืนยังรหัสผ่าน:</label>
          <input type="password" class="form-control" placeholder="ยืนยังรหัสผ่าน" name="pwd">
        </div>

        <div class="form-group">
          <label>
            <input type="checkbox" ng-model="form.active" ng-true-value="1" ng-false-value="0" /> <span ng-if="active == 0" class="label bg-danger-400 heading-text">ยังไม่ได้จ่าย</span>
            <span ng-if="active == 1" class="label bg-success heading-text">จ่ายแล้ว</span>
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-link"> <i class="icon-cross2"></i> ยกเลิก</button>
        <button type="submit" class="btn  bg-slate-800"> <i class="icon-floppy-disk"></i> ยืนยัน</button>
      </div>
    </div>
  </div>
</div>

<div id="form_manager" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" data-dismiss="modal" class="close">×</button>
        <h5 class="modal-title">เพิ่มผู้ใช้ประเภท ผู้จัดการ</h5>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="user">ชื่อ</label>
          <input type="text" class="form-control" placeholder="ชื่อ" name="email">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          <label for="pwd">รหัสผ่าน:</label>
          <input type="password" class="form-control" placeholder="รหัสผ่าน" name="pwd">
        </div>
        <div class="form-group">
          <label for="pwd">ยืนยังรหัสผ่าน:</label>
          <input type="password" class="form-control" placeholder="ยืนยังรหัสผ่าน" name="pwd">
        </div>

        <div class="form-group">
          <label>
            <input type="checkbox" ng-model="form.active" ng-true-value="1" ng-false-value="0" /> <span ng-if="active == 0" class="label bg-danger-400 heading-text">ยังไม่ได้จ่าย</span>
            <span ng-if="active == 1" class="label bg-success heading-text">จ่ายแล้ว</span>
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-link"> <i class="icon-cross2"></i> ยกเลิก</button>
        <button type="submit" class="btn  bg-slate-800"> <i class="icon-floppy-disk"></i> ยืนยัน</button>
      </div>
    </div>
  </div>
</div>


</div>
</div>

@endsection
@section('script')
<script type="text/javascript" src="{{ asset('assets/js/angular/controller/UsersController.js') }}"></script>
@endsection
