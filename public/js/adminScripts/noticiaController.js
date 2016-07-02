var app = angular.module('App', []);
app.controller('noticiasController', function($scope, $sce) {

  $scope.setNewsValues = function(id, title, content) {
    $scope.newsID 		= id;
    $scope.newsTitle 	= title;
    $scope.newsContent 		= content;
  };

  $scope.setEdit = function(id, title, content, auth) {
    $("#modalModificarNoticia input:checkbox").prop('checked', false);
    if (!$('#divFile2').hasClass('hide')) {
      $('#divFile2').addClass('hide');
    }
    if (!$('#divImg2').hasClass('hide')) {
      $('#divImg2').addClass('hide');
    }
    $scope.newsID = id;
    $scope.newsTitle = title;
    $scope.newsContent = content;
    $scope.newsAuth = auth;
    $('#newsTextarea').trumbowyg('html', content);
  };

  $scope.renderHtml = function(html_code) {
	  return $sce.trustAsHtml(html_code);
	};
});


jQuery(document).ready(function($) {
  $('textarea').trumbowyg({lang: 'es', btns: [['viewHTML'], ['formatting'], 'btnGrp-semantic', ['superscript', 'subscript'], 'btnGrp-justify', 'btnGrp-lists', ['horizontalRule'], ['removeformat'], ['fullscreen']]});
  $("#collapseAgregarArchivo > div > form input:checkbox").prop('checked', false);

	$('#toFile').change(function(){
		if(this.checked) {
			$('#divFile').removeClass('hide');
		} else {
			$('#divFile').addClass('hide');
		}
	});

	$('#toImg').change(function(){
		if(this.checked) {
			$('#divImg').removeClass('hide');
		} else {
			$('#divImg').addClass('hide');
		}
	});

	$('#toFile2').change(function(){
		if(this.checked) {
			$('#divFile2').removeClass('hide');
		} else {
			$('#divFile2').addClass('hide');
		}
	});

	$('#toImg2').change(function(){
		if(this.checked) {
			$('#divImg2').removeClass('hide');
		} else {
			$('#divImg2').addClass('hide');
		}
	});
});
