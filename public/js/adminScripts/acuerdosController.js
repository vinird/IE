var app = angular.module('App', []);
app.controller('acuerdosController', function($scope) {
	dateC = new Date();
	$scope.today = new Date(dateC.getFullYear() , dateC.getMonth() , dateC.getDate()).getTime();
	$scope.title = "";
	$scope.id = ""; 
	$scope.date;
	$scope.content = "";

	$scope.dateConverted = function(date) {
		var myDate= date;
		myDate=myDate.split("-");
		var newDate=myDate[0]+","+myDate[1]+","+myDate[2];
		return new Date(newDate).getTime();
	}

	$scope.eliminarAcuerdo = function(title, id){
		$scope.title = title;
		$scope.id = id; 
	}

	$scope.modificar = function(title, id, agreement_date, content) {
		$scope.title = title;
		$scope.id = id; 
		$scope.date = agreement_date;
		$scope.content = content;
	}
});
