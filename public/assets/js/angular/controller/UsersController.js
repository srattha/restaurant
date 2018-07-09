app.controller('UsersController', function ($scope, $http, $timeout, dataService, fn) {

    var switch_active;
    $scope.active = 0;
    $scope.modal = function (data) {
      console.log(data)
      if (data == 1) {
        switch_active = new Switchery(document.querySelector("input[ng-model='form.active']"));
         $("#form_customer").modal("show");
       }else if (data == 2) {
         $("#form_admin").modal("show");
       }else if (data == 3) {
        $("#form_kitchen").modal("show");
         
       }else if (data == 4) {
         $("#form_manager").modal("show");
       }
        // switch_active = new Switchery(document.querySelector("input[ng-model='form.active']"));
      
   }
   $scope.myFunc = function(data){
    
    if (data == 0) {
        console.log(data)
      $scope.active = 0;
    }else {
        console.log(data)
      $scope.active = 1;
    }
    
   }


  



})