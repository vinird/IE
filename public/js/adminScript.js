jQuery(document).ready(function($) {
	// init
	var odd = true;
	$('.side-nav-2').removeClass('hide');
	$('.side-nav-2').hide();
	$('#repositorio-dropdown').removeClass('hide');
	$('#repositorio-dropdown').hide();
	//

// nav bar xs ////////////////
	$('#hiddenButton').click(function(event) {
		if(odd){
			var bodyY = parseInt($('body').css('width').slice(0, -2));
			var buttonW = parseInt($(this).css('width').slice(0, -2));
			$(this).animate({left: (bodyY-buttonW)+"px" }, 400);
			$('.side-nav-2').show(400);

			setTimeout(function(){
				$('#hiddenButton').html('<i class="fa fa-arrow-circle-left fa-lg" aria-hidden="true"></i>');
			} , 400);

			odd = false;
		} else {
			$(this).animate({left: '0'}, 400);
			$('.side-nav-2').hide(400);
			setTimeout(function(){
				$('#hiddenButton').html('<i class="fa fa-arrow-circle-right fa-lg" aria-hidden="true"></i>');
			} , 400);
			odd = true;
		}
	});
// resize function //////////////
	$(window).resize(function(event) {
		var buttonW = parseInt($('#hiddenButton').css('left').slice(0, -2));

		if(buttonW > 0){
			var bodyY = parseInt($('body').css('width').slice(0, -2));
			$('#hiddenButton').animate({left: (bodyY-60)+"px" }, 0);
		}
	});
///////////////////////////////
// repositorio-dropdown
	var chevron = $("#dropdown-chevron");
	var dropdownList = $("#repositorio-dropdown-ul");
	dropdownList.removeClass('hide');
	dropdownList.hide();

	$("#repositorio-dropdown-btn").hover(function() {
		/* Stuff to do when the mouse enters the element */
		dropdownList.show(300);
		chevron.removeClass('fa-chevron-down');
	}, function() {
		/* Stuff to do when the mouse leaves the element */
		setTimeout(function(){
			if( dropdownList.attr('isActive') == "false"){
				dropdownList.hide(300);
				chevron.addClass('fa-chevron-down');
			}
		},300);
	});
	// cuando esta dentro del dropdown
	dropdownList.hover(function() {
		dropdownList.attr('isActive', 'true');
	}, function() {
		setTimeout(function(){
			dropdownList.attr('isActive', 'false');
			dropdownList.hide(300);
			chevron.addClass('fa-chevron-down');
		},300);
	});
///////////////////////////////
// repositorio-dropdown 2
	var chevron2 = $("#dropdown-chevron2");
	var dropdownList2 = $("#repositorio-dropdown-ul2");
	dropdownList2.removeClass('hide');
	dropdownList2.hide();

	chevron2.hover(function(event) {
		dropdownList2.show(300);
	});
	$("#side-nav-2 li:not('#dropdown-chevron2')").click(function(event) {
		dropdownList2.hide(300);
	});
///////////////////////////
// boton mostrar panel
var btnAddPanelToogle = $('#btnAddPanelToogle');
btnAddPanelToogle.click(function(event) {
	if (btnAddPanelToogle.attr('aria-expanded') == 'true') {
		btnAddPanelToogle.fadeOut(200);
		setTimeout(function(){
			btnAddPanelToogle.removeClass('fa-minus-circle');
			btnAddPanelToogle.addClass('fa-plus-circle');
			btnAddPanelToogle.fadeIn(200);
		},200);
	} else {
		btnAddPanelToogle.fadeOut(200);
		setTimeout(function(){
			btnAddPanelToogle.removeClass('fa-plus-circle');
			btnAddPanelToogle.addClass('fa-minus-circle');
			btnAddPanelToogle.fadeIn(200);
		},200);
	}
 });

// Repositorio
 	var state = $('#hiddenStateRepo');
	var btnRepo1 = $(".btnRepo1");
	var btnRepo2 = $(".btnRepo2");
	var btnRepo3 = $(".btnRepo3");

	var form1Repo = $(".form1Repo");
	var form2Repo = $(".form2Repo");
	var form3Repo = $(".form3Repo");
	form1Repo.addClass('animated');
	form2Repo.addClass('animated');
	form3Repo.addClass('animated');

	btnRepo1.click(function() {
		resetForm();
		btnRepo1.parent("li").addClass('active');
		btnRepo2.parent("li").removeClass('active');
		btnRepo3.parent("li").removeClass('active');

		if (state.attr('stateIndex') == '2') {
			form2Repo.addClass('fadeOutRight');

			setTimeout(function(){

				form2Repo.addClass('hide');
				form1Repo.removeClass('hide');
				form1Repo.addClass('fadeInLeft');
				state.attr('stateIndex' , '1');
			},300);
		} else {
			if(state.attr('stateIndex') == '3'){
				form3Repo.addClass('fadeOutRight');

				setTimeout(function(){

					form3Repo.addClass('hide');
					form1Repo.removeClass('hide');
					form1Repo.addClass('fadeInLeft');
					state.attr('stateIndex' , '1');
				},300);
			}
		}
	});

	btnRepo2.click(function() {
		resetForm();
		btnRepo2.parent("li").addClass('active');
		btnRepo1.parent("li").removeClass('active');
		btnRepo3.parent("li").removeClass('active');

		if (state.attr('stateIndex') == '1') {
			form1Repo.addClass('animated fadeOutLeft');
			setTimeout(function(){

				form1Repo.addClass('hide');
				form2Repo.removeClass('hide');
				form2Repo.addClass('fadeInRight');
				state.attr('stateIndex', '2')
			},300);
		} else {
			if (state.attr('stateIndex') == '3'){
				form3Repo.addClass('fadeOutRight');
				setTimeout(function(){

					form3Repo.addClass('hide');
					form2Repo.removeClass('hide');
					form2Repo.addClass('fadeInLeft');
					state.attr('stateIndex', '2')
				},300);
			}
		}

	});

	btnRepo3.click(function() {
		resetForm();
		btnRepo3.parent("li").addClass('active');
		btnRepo2.parent("li").removeClass('active');
		btnRepo1.parent("li").removeClass('active');

		if (state.attr('stateIndex') == '2') {
			form2Repo.addClass('fadeOutLeft');

			setTimeout(function(){

				form2Repo.addClass('hide');
				form3Repo.removeClass('hide');
				form3Repo.addClass('fadeInRight');
				state.attr('stateIndex' , '3');
			},300);
		} else {
			if(state.attr('stateIndex') == '1'){
				form1Repo.addClass('fadeOutLeft');

				setTimeout(function(){

					form1Repo.addClass('hide');
					form3Repo.removeClass('hide');
					form3Repo.addClass('fadeInRight');
					state.attr('stateIndex' , '3');
				},300);
			}
		}
	});

	function resetForm(){
		form1Repo.removeClass('fadeOutLeft');
		form1Repo.removeClass('fadeInLeft');
		form1Repo.removeClass('fadeOutRight');
		form1Repo.removeClass('fadeInRight');

		form2Repo.removeClass('fadeInRight');
		form2Repo.removeClass('fadeOutRight');
		form2Repo.removeClass('fadeInLeft');
		form2Repo.removeClass('fadeOutLeft');

		form3Repo.removeClass('fadeInRight');
		form3Repo.removeClass('fadeOutRight');
		form3Repo.removeClass('fadeInLeft');
		form3Repo.removeClass('fadeOutLeft');
	}

	// Popover
	$(function () {
	  $('[data-toggle="popover"]').popover()
	});
	// Tooltip
	$('.ttip').tooltip({
		'delay': { "show": 100, "hide": 100 },
		'template': '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner" style="font-size: 14px;"></div></div>'
	});
	/// end
	//// Message
	$('#newMessage').click(function(e) {
		e.stopPropagation();
		$(this).hide(400);
		$('#formMessage').removeClass('hide');
		$('#formMessage').hide();
		$('#formMessage').show(400);
	});

	/// Alerts //////////////
	setTimeout(function(){
		$('footer').removeClass('bounceInLeft');
		$('footer').addClass('fadeOutUp');
		setTimeout(function(){
			$('footer').remove();
		},3000);
	},6000);

});
