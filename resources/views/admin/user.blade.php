@extends('admin.master')

@section('content')
<div ng-controller="UsersController">
  <div class="panel">
    <div class="panel-heading bg-slate-800">
      <h1 class="panel-title text-semibold">จัดการข้อมูลสมาชิก</h1>
      <div class="heading-elements">
        <div class="btn-group">
          <button class="btn bg-slate-800" ng-click="modal()" ><i class="icon-plus-circle2"></i> เพิ่ม</button>
        </div>

      </div>
    </div>
    <div style="padding: 10px;">

      <div class="table-responsive">
        <table id="dataTable" class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>ชื่อ</th>
              <th>อีเมล</th>
              <th>ระดับ</th>
              <th>Status</th>
              <th>created_at</th>
              <th>updated_at</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="a in lists">
              <td>@{{a.id}}</td>
              <td>@{{a.name}}</td>
              <td>@{{a.email}}</td>
              <td ng-if="a.users_type_id==1">ลูกค้า</td>
              <td ng-if="a.users_type_id==2">ผู้ดูแลระบบ</td>
              <td ng-if="a.users_type_id==3">ครัว</td>
              <td ng-if="a.users_type_id==4">ผู้จัดการ</td>
              <td ng-if="a.active"><span class="label label-success">Active</span></td>
              <td ng-if="!a.active"><span class="label label-danger">Inactive</span></td>
              <td>@{{a.created_at | convertToDate | date:'dd MMM yyyy hh:mm a'}}</td>
              <td>@{{a.updated_at | convertToDate | date:'dd MMM yyyy hh:mm a'}}</td>
              <td><a href="javascript:void(0)" ng-click="modal(a)"><i class="icon-pencil7"></i>
              </a>
              <a href="javascript:void(0)" id="sweet_combine" ng-click="delete(a.id)" ><i class="icon-trash"></i></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div id="form" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
           <form ng-submit="submit(form)">
            <div class="modal-header bg-primary">
              <button type="button" data-dismiss="modal" class="close">×</button>
              <h5 class="modal-title">เพิ่มผู้ใช้</h5>
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
                <input type="password" class="form-control" ng-model="form.passwordConfirm" placeholder="ยืนยังรหัสผ่าน" name="pwd">
              </div>
              <div class="form-group">
                <label for="sel1">กำหนดระดับผู้ใช้งาน</label>
                <select id="type"  ng-model="form.users_type_id" class="form-control" convert-to-number>
                  <option value="1">ลูกค้า</option>
                  <option value="2">ผู้ดูแลระบบ</option>
                  <option value="3">ครัว</option>
                  <option value="4">ผู้จัดการ</option>
                </select>
              </div>

              <div class="form-group">
                <label>
                  <input type="checkbox" ng-model="form.active" ng-true-value="1" ng-false-value="0" /> อนุญาตใช้
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


   <!--  <div id="form_admin" class="modal fade">
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
                <input type="checkbox" ng-model="form.active" ng-true-value="1" ng-false-value="0" /> 
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
    </div> -->


  </div>
</div>

@endsection
@section('script')
<script type="text/javascript" src="{{ asset('assets/js/angular/controller/UsersController.js') }}"></script>
@endsection
