var app = angular.module('App', []);
app.controller('eventoController', function($scope, $sce) {

  $scope.setEventValues = function(id, title, content) {
    $scope.eventID 		= id;
    $scope.eventTitle 	= title;
    $scope.eventContent 		= content;
  };

  $scope.setEdit = function(id, title, event_date, content, sede_id, org) {
    $("#modalModificarEvento input:checkbox").prop('checked', false);
    $('#divFile2 > div > input').val('');
    $('#divImg2 > div > input').val('');
    if (!$('#divFile2').hasClass('hide')) {
      $('#divFile2').addClass('hide');
    }
    if (!$('#divImg2').hasClass('hide')) {
      $('#divImg2').addClass('hide');
    }
    $scope.eventID = id;
    $scope.eventTitle = title;
    $scope.eventDate = new Date(event_date);
    $scope.eventContent = content;
    $scope.eventSede = sede_id;
    $scope.eventOrg = org;
    $('#eventTextArea').trumbowyg('html', content);
  };

  $scope.renderHtml = function(html_code) {
	  return $sce.trustAsHtml(html_code);
	};
});


jQuery(document).ready(function($) {
  $('textarea').trumbowyg({lang: 'es', btns: [['viewHTML'], ['formatting'], 'btnGrp-semantic', ['superscript', 'subscript'], 'btnGrp-justify', 'btnGrp-lists', ['horizontalRule'], ['removeformat'], ['fullscreen']]});
  $("#collapseAgregarEvento > div > form input:checkbox").prop('checked', false);
  $(':input').not(':button, :submit, :reset, :hidden, .hide, .hidden').val('').removeAttr('checked').removeAttr('selected');
  $('#divFile > div > input').val('');
  $('#divImg > div > input').val('');

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
