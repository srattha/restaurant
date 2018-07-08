app.controller('ReservationsController', function ($scope, $http, $timeout, dataService, fn) {

    var switch_active;
    $scope.active = 0;
    $scope.modal = function (data) {
        switch_active = new Switchery(document.querySelector("input[ng-model='form.active']"));
       $("#form").modal("show");
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