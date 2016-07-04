var app = angular.module('App', []);

app.controller('sedesController', function($scope, $sce) {

	$scope.fSedeID= function (id, name) {
	  $scope.sedeID= id;
	  $scope.sedeName= name;
	};

	$scope.modSede= function (id, name, address, phone, link) {
	  $scope.sedeID= id;
	  $scope.sedeName= name;
	  $scope.address= address;
	  $scope.phone= phone;
	  $scope.link= link;
		$('.frameMap2').addClass('hide');
	};

	$scope.verMapa = function(){ 
		// $('iframe').attr('src', $scope.linkMap);
		$('.frameMap').removeClass('hide')
		$('.frameMap').append($scope.linkMap);
	}

	$scope.ocultarMapa = function(){
		$('.frameMap').addClass('hide');
	}

	$scope.verMapa2 = function(){
		// $('iframe').attr('src', $scope.linkMap);
		$('.frameMap2').removeClass('hide');
		$('.frameMap2').append($scope.link);
	}

	$scope.ocultarMapa2 = function(){
		$('.frameMap2').addClass('hide');
	}

	$scope.renderHtml = function(html_code)
	{
	    return $sce.trustAsHtml(html_code);
	    //<p ng-bind-html="renderHtml(x.link)"></p>
	};
});
 
jQuery(document).ready(function($) {
	var toMap = true;
	$('.toMap').change(function(){
		if(toMap) {
			$('.frameMap').addClass('hide');
			$('.forMap').removeClass('hide');
			$('#tAreaMap1').val('');
			toMap = false;
		} else {
			$('.forMap').addClass('hide');
			$('.frameMap').empty();
			toMap = true;
		}
	});

	var toMap2 = true;
	$('.toMap2').change(function(){
		if(toMap2) {
			$('.forMap2').removeClass('hide');
			toMap2 = false;
		} else {
			$('.forMap2').addClass('hide');
			toMap2 = true;
		}
	});
});