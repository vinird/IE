var app = angular.module('App', []);
app.controller('acuerdosController', function($scope) {
	dateC = new Date();
	$scope.today = new Date(dateC.getFullYear() , dateC.getMonth() , dateC.getDate()).getTime();
	$scope.title = "";
	$scope.id = ""; 
	$scope.date;
	$scope.content = "";
	// seguimiento
	$scope.idSeguimiento = "";
	$scope.titleSeguimiento = "";
	$scope.contentSeguimiento = "";

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

	$scope.setValuesSeguimiento = function(id, title, content){
		$scope.idSeguimiento = id;
		$scope.titleSeguimiento = title;
		$scope.contentSeguimiento = content;
	}
});

$(document).ready(function() {
	var toUser = true;
	$('.toUser').change(function(){
		if(toUser) {
			$('.forUser').removeClass('hide');
			toUser = false;
		} else {
			$('.forUser').addClass('hide');
			toUser = true;
		}
	});

	var toFile = true;
	$('.toFile').change(function(){
		if(toFile) {
			$('.forFile').removeClass('hide');
			toFile = false;
		} else {
			$('.forFile').addClass('hide');
			toFile = true;
		}
	});

	var toUser2 = true;
	$('.toUser2').change(function(){
		if(toUser2) {
			$('.forUser2').removeClass('hide');
			toUser2 = false;
		} else {
			$('.forUser2').addClass('hide');
			toUser2 = true;
		}
	});

	var toFile2 = true;
	$('.toFile2').change(function(){
		if(toFile2) {
			$('.forFile2').removeClass('hide');
			toFile2 = false;
		} else {
			$('.forFile2').addClass('hide');
			toFile2 = true;
		}
	});

	$('#tabGenerales').click(function (e) {
	  	e.preventDefault();
	  	$(this).tab('show');
	});

	$('#tabFianlizados').click(function (e) {
	  	e.preventDefault();
	  	$(this).tab('show');
	});
});
