app.controller('UsersController', function ($scope, $http, $timeout, dataService, fn) {

  var switch_active;
  $scope.active = 0;
  $scope.modal = function (data) {
   if (switch_active) {
    $("input[ng-model='form.active']").siblings().remove();
  }
  if (data) {
    $scope.form = data;
    if ($scope.form.active) {
      $("input[ng-model='form.active']").prop('checked', true);
    } else {
      $("input[ng-model='form.active']").prop('checked', false);
    }
  }
  switch_active = new Switchery(document.querySelector("input[ng-model='form.active']"));
  $("#form").modal("show");

  setTimeout(function(){
    $("#type").change();
  },750)
  
}



$scope.submit = function(data){
  console.log(data);
  if($scope.form.password != $scope.form.passwordConfirm){
    swal({
      title: "Oops...",
      text: "รหัสไม่ตรงกัน!",
      confirmButtonColor: "#EF5350",
      type: "error"
    });
    return;    
  }
//   var admin = {"id":data.id,"email":data.email,"users_type_id":data.users_type_id,
//   "name":data.name,"password":data.password
// }
dataService.putData("/api/v1/admin", data).then(function (res) {
  if(res.data.status){
    fn.alertSuccess();
    list();
    $('#form').modal('hide');
  }else{
    fn.alertError();
  }
}).catch(err => {
  fn.alertError(err.statusText)
})
}

function list() {

  dataService.postData("/api/v1/admin").then(res => {
    $scope.lists = res.data.result;
    $('#dataTable').DataTable().destroy();
    setTimeout(function() {
      fn.makeDataTable($('#dataTable'),[]);
    }, 200);
  }).catch(err => {
    fn.alertError(err.statusText)
  })
}




function init() {
  list();

}

init();




})






