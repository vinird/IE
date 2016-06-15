var app = angular.module('App', []);
app.controller("repositorioController" , function($scope){
	$scope.fileID ="";
	$scope.fileName ="";
	$scope.userFileID ="";
	$scope.fileUrl="";

	$scope.setFileValues = function(id , name , userIDF , urlF) {
		$scope.fileID 		= id;
		$scope.fileName 	= name;
		$scope.userFileID	= userIDF;
		$scope.fileUrl		= urlF;
	}
});