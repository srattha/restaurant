app.controller('UsersController', function ($scope, $http, $timeout, dataService, fn) {

  var switch_active;
  $scope.active = 0;
  $scope.modal = function (data) {
   if (switch_active) {
    $("input[ng-model='form.active']").siblings().remove();
  }
  if (data == 1) {

    switch_active = new Switchery(document.querySelector("input[ng-model='form.active_user']"));
    $("#form_customer").modal("show");
  }else if (data == 2) {
    switch_active = new Switchery(document.querySelector("input[ng-model='form.active_admin']"));
    $("#form_admin").modal("show");
  }else if (data == 3) {
    switch_active = new Switchery(document.querySelector("input[ng-model='form.active']"));
    $("#form_kitchen").modal("show");

  }else if (data == 4) {
    switch_active = new Switchery(document.querySelector("input[ng-model='form.active']"));
    $("#form_manager").modal("show");
  }
        // switch_active = new Switchery(document.querySelector("input[ng-model='form.active']"));
      }



      $scope.submit_admin = function(data){
        console.log(data);
      }


    })






