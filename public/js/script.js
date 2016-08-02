jQuery(document).ready(function($) {

//// event click of pager options 
$('.pager-option-').click(function() {
	setBackground($(this));
	cleanBackground($(this));
});
//// set a background to pager option selected //// 
function setBackground( optionSelected ) {
	optionSelected.css('background-color', '#BAE5A4');
}
//// clean backgrounds of pager options ///
function cleanBackground ( optionSelected ){
	for (var i = 1; i <= 8; i++) {
		var newOption = $('#pager-option-'+i);
		if( optionSelected.attr('id') != newOption.attr('id')){
			newOption.css('background-color', '#FFFFFF');
		}
	}
}
//////////////// slide document /////////
$(".enlace-panel").click(function () {
	// Optiene el numero de id
	var value = $(this).attr('id');
	value = value.slice(-1);
	// Optiene la posicion top del panel y le resta 60 px para contrarestar el nav fixed-top
	var position = ($("#panel"+value+"").offset().top);
	// Realiza el desplazamiento hasta la posicion del panel
    $('body,html').animate({
        scrollTop: position
	    }, 1000);
	});
/////////////// Map link ////////// 
var mapTitle = $('#map-title');
var colMap = $('#col-map');

$('.loadMapC').click(function(event) {
	$('iframe').remove();
	$('.frameMap').append($(this).attr('linkM'));
	setTitleMapText($(this).text());
	slideTitle();
});

// $('.map-link-turrialba').click(function() {
// 	$('#col-map').attr('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15721.639810408007!2d-83.67906114973887!3d9.899773177644093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0d42417bc6851%3A0xd2ae13fcaa9ce072!2sUniversidad+de+Costa+Rica!5e0!3m2!1ses-419!2scr!4v1461559646716');
// 	slideTitle();
// 	setTitleMapText('Mapa de Turrialba');
// });
// $('.map-link-puntarenas').click(function() {
// 	$('#col-map').attr('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7858.903892690256!2d-84.81089384045744!3d9.979475521599378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x617ab3a3e72c0d8f!2sUniversidad+de+Costa+Rica%2C+Sede+Pac%C3%ADfico!5e0!3m2!1ses-419!2scr!4v1461556238601');	
// 	slideTitle();
// 	setTitleMapText('Mapa de Puntarenas');
// });
// $('.map-link-guapiles').click(function() {
// 	$('#col-map').attr('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31413.306858782344!2d-83.78705440086618!3d10.20796927497937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0b81ac8999b1d%3A0x1f1fd155efac4a9d!2sUniversidad+de+Costa+Rica+Recinto+de+Gu%C3%A1piles!5e0!3m2!1ses-419!2scr!4v1461638779514');	
// 	slideTitle();
// 	setTitleMapText('Mapa de Guápiles');
// });
// $('.map-link-limon').click(function() {
// 	$('#col-map').attr('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31435.64270873805!2d-83.07160899094528!3d9.979194411762354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa7053ee9e58915%3A0x8258c3f42eb0a521!2sUniversidad+de+Costa+Rica!5e0!3m2!1ses-419!2scr!4v1461639863631');
// 	slideTitle();
// 	setTitleMapText('Mapa de Limón');
// });
// $('.map-link-sanRamon').click(function() {
// 	$('#col-map').attr('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15712.716292763325!2d-84.48836224739787!3d10.084408883147402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xb205ea7de0c2bb41!2sUniversidad+de+Costa+Rica!5e0!3m2!1ses-419!2scr!4v1461639205655');
// 	slideTitle();
// 	setTitleMapText('Mapa de San Ramón');
// });
// $('.map-link-liberia').click(function() {
// 	$('#col-map').attr('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15686.105464010838!2d-85.46759586118002!3d10.616155294094824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f757d1636b1ee43%3A0x5d04110e14abc710!2sUCR!5e0!3m2!1ses-419!2scr!4v1461639316082');	
// 	slideTitle();
// 	setTitleMapText('Mapa de Liberia');
// });
// $('.map-link-paraiso').click(function() {
// 	$('#col-map').attr('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15725.12885002685!2d-83.87788478459672!3d9.826648008048751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa120959a749de5%3A0xa7ec6a4fddf52b99!2sUniversidad+de+Costa+Rica!5e0!3m2!1ses-419!2scr!4v1461639399026');	
// 	slideTitle();
// 	setTitleMapText('Mapa de Paraíso');
// });
// $('.map-link-tacares').click(function() {
// 	$('#col-map').attr('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31428.82350223725!2d-84.31752317316916!3d10.049586687139135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0583b4aa86197%3A0x5161d0f3c3e42df!2sUCR!5e0!3m2!1ses-419!2scr!4v1461639559829');
// 	slideTitle();
// 	setTitleMapText('Mapa de Tacares de Grecia');		
// });
// $('.map-link-golfito').click(function() {
// 	$('#col-map').attr('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15778.181169639245!2d-83.17555011992717!3d8.639574714499668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa443824f447c0d%3A0x1c5a1d999b58ba82!2sUniversidad+de+Costa+Rica!5e0!3m2!1ses-419!2scr!4v1461639702039');
// 	slideTitle();
// 	setTitleMapText('Mapa de Golfito');	
// });
///// map title animation //////// 
function slideTitle(){
	var navMapActive = $('#map-nav-section');
	if(navMapActive.attr('map-nav-active') == 'true'){
		navMapActive.hide(400);
		navMapActive.attr('map-nav-active','false')
	}
	mapTitle.slideToggle(400);
	mapTitle.slideToggle(400);
/*
	var colMapHidden = $('#col-map-hidden');

	var colMapWith = $('#col-map').css('width');
	var colMapheight = $('#col-map').css('height');

	colMapHidden.css({
		width: colMapWith,
		height: colMapheight
	});

	colMap.fadeToggle(400, function() {
		colMapHidden.attr('class', ' ');
	});
	colMap.fadeToggle(400, function() {
		colMapHidden.attr('class', 'hide');
	});
*/
	
};
/////// map text ///////////////
function setTitleMapText(text){
	setTimeout(function(){
		mapTitle.text(text);	
	}, 400);
};
//////// map nav toggle /////
var initNavToggle = false;
var mapNavSecction = $('#map-nav-section');
mapNavSecction.hide();
$('#icon-data-toggle-map').click(function(even) {
	if(initNavToggle == false){
		mapNavSecction.hide();
		initNavToggle = true;
	}
	if (mapNavSecction.attr('map-nav-active') == 'true' ) {
		mapNavSecction.hide(400);
		mapNavSecction.attr('map-nav-active', 'false');
	} else {
		mapNavSecction.show(400);
		mapNavSecction.attr('map-nav-active', 'true');
	}

});
//////////////// end map ////////////////////

////////////////// Events //////////////////
var initNavEventsToggle = false;
var eventsNavSecction = $('#events-nav-section');
eventsNavSecction.removeClass('hide');
eventsNavSecction.hide();
$('#icon-data-toggle-events').click(function() {
	if(initNavEventsToggle == false){
		eventsNavSecction.hide();
		initNavEventsToggle = true;
	}
	if (eventsNavSecction.attr('events-nav-active') == 'true' ) {
		eventsNavSecction.hide(400);
		eventsNavSecction.attr('events-nav-active', 'false');
	} else {
		eventsNavSecction.show(400);
		eventsNavSecction.attr('events-nav-active', 'true');
	}

});
$('.events-link-toggle').click(function() {
	eventsNavSecction.hide(400);
	eventsNavSecction.attr('events-nav-active', 'false');
});

////////////// end events /////////////

///////////// Noticias //////////////// 
$('.show-more-link').removeClass('hide');
$('.show-more-link').hide();

$('.show-more-link').click(function() {
	var parent = $(this).siblings('.resizable-col-events');
	var child = parent.children('.resizable-panel');
	var childHeight = child.height();

	if( $(this).attr('data-active') == 'false' ) {
		$(this).html('<h6 >Mostrar menos <i class="fa fa-angle-double-up" aria-hidden="true"></i></h6>');
		$(this).attr('data-active', 'true');
		parent.css('max-height', (childHeight+30));
	} else {
		$(this).html('<h6 >Mostrar más <i class="fa fa-angle-double-down" aria-hidden="true"></i></h6>');
		$(this).attr('data-active', 'false');
		parent.css('max-height', '544px');
	}
});
var stateInit = true;
var showMoreLink = $('.unexist');
var showMoreLink2 = $('.unexist');

$('.resizable-col-events').mouseenter(function() {
	var parentSize = $(this).height();
	var childSize = $(this).children('.resizable-panel').height();

	if((childSize) > parentSize) {
		if(stateInit == true){
			showMoreLink = $(this).siblings('.show-more-link');
			showMoreLink.show(200);
			showMoreLink2.hide(200);
			stateInit = false;
		} else {
			stateInit = true;
			showMoreLink.hide(200);
			showMoreLink2 = $(this).siblings('.show-more-link');
			showMoreLink2.show(200);
		}
	}
});
////////////// end Noticias ////////////////
///////////// slideImages //////////////////////
var slide = true;
$('#btnSlideImages').click(function(event) {
	if(slide){
		$('#btnSlideImages i').removeClass('fa-plus-circle');
		$('#btnSlideImages i').addClass('fa-minus-circle');
		$('#submitSlideImages').removeClass('hide');
		$('#submitSlideImages').hide();
		$('#submitSlideImages').show(300);
		slide = false;
	} else {
		$('#btnSlideImages i').removeClass('fa-minus-circle');
		$('#btnSlideImages i').addClass('fa-plus-circle');
		$('#submitSlideImages').hide(300);
		setTimeout(300, function(){
			$('#submitSlideImages').addClass('hide');
		})
		slide = true;
	}
});

/// Alerts //////////////
setTimeout(function(){
	$('.alert').fadeOut(5000, function(){
		$('.alert').remove();
	});
},5000);


//// aside nav /////////
$('#botonAutores').click(function(){
	if($('body').width() < 768){
		$('.site-wrap').css('width', '100%');
	}
	$('.site-wrap').css('left', '0px');
	$('.site-wrap-shadow').css('left', '0px');
	$('.site-wrap-shadow').hide();
	$('.site-wrap-shadow').fadeIn(500);
});
$('#botonAutoresCerrar').click(function(){
	$('.site-wrap').css('width', '50%');
	$('.site-wrap').css('left', '-50%');
	$('.site-wrap-shadow').fadeOut(500);
	setTimeout(function(){
		$('.site-wrap-shadow').css('left', '-100%');
	},500);
});

//// end script
});