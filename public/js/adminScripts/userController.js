var app = angular.module('App', []);
app.controller('userController', function($scope) {

	$scope.userId;
	$scope.userName;
	$scope.myOrderActive = 'name';


	$scope.addUser = function(id , name){
		$scope.userId= id;
		$scope.userName = name;
	}

});