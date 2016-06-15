var app = angular.module('App', []);
app.controller("repositorioController" , function($scope){
	$scope.fileID ="";
	$scope.fileName ="";
	$scope.fileTitle ="";
	$scope.fileCategoryID ="";
	$scope.fileCategory ="";
	$scope.fileKeyWords ="";


	$scope.fileUrl="";
	$scope.userFileID ="";

	$scope.setFileValues = function(id , name , userIDF , urlF) {
		$scope.fileID 		= id;
		$scope.fileName 	= name;
		$scope.userFileID	= userIDF;
		$scope.fileUrl		= urlF;
	}

	$scope.setEdit = function(id, name, title, keyWords, categoryID, furl){
		$scope.fileID = id;
		$scope.fileName = name;
		$scope.fileTitle = title;
		$scope.fileKeyWords = keyWords;
		$scope.fileCategoryID = categoryID;
		$scope.fileUrl= furl;
	}
});