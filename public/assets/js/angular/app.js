var url = window.location.href;
var arr = url.split("/");
var result = arr[0] + "//" + arr[2];
var API_URL = result;
var username = "developer@cakeboxsolutions.com";
var password = "P@ssw0rd";
var MEDIA_PATH = "/customer/upload/media";
var EMERGENCY_PATH = "/customer/upload/emergency";
var config = {header:"Authorization : Basic "+btoa(username+":"+password)}

var app = angular.module('app',[]);
app.config(function($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
    var auth = btoa(username+":"+password);
    $httpProvider.defaults.headers.common['Authorization'] = 'Basic ' + auth;
}); 
app.run(function($rootScope) {
	$rootScope.MEDIA_PATH = MEDIA_PATH;
	$rootScope.EMERGENCY_PATH = EMERGENCY_PATH;
	$rootScope.API_URL = API_URL;
});

// var app = angular.module('app', [],function($interpolateProvider) {
// 	$interpolateProvider.startSymbol('[[');
// 	$interpolateProvider.endSymbol(']]');
// 	app.config(function($httpProvider) {
//     $httpProvider.defaults.useXDomain = true;
//     delete $httpProvider.defaults.headers.common['X-Requested-With'];
//     var auth = btoa(username+":"+password);
//     $httpProvider.defaults.headers.common['Authorization'] = 'Basic ' + auth;
// }); 
// });
