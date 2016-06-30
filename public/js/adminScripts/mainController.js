var app = angular.module('App', []);
app.controller('mainController', function($scope) {
	dateC = new Date();
	$scope.today = new Date(dateC.getFullYear() , dateC.getMonth() , dateC.getDate()).getTime();

	$scope.dateConverted = function(date) {
		var myDate= date;
		myDate=myDate.split("-");
		var newDate=myDate[0]+","+myDate[1]+","+myDate[2];
		return new Date(newDate).getTime();
	}
});