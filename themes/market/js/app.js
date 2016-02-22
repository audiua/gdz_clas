$(document).ajaxSend(function(event, request, settings) {

	$('.task-title').show();
	$('.task-separator').show();
	$('#inverted-contain').show();
    $('.loading').show();
    $('.darking').show();
    // $('body,html').animate({scrollTop:480},200);
    $('body,html').animate({scrollTop:0},200);
});

$(document).ajaxComplete(function(event, request, settings) {
    
	var contHeight = $('.content').outerHeight();
	var sidebarHeight = $('.sidebar').outerHeight();
	// console.log('resize');
	// console.log(sidebarHeight);
	if(contHeight > sidebarHeight){
		$('.sidebar').height(contHeight);
	}
	
    $('.loading').hide();
    $('.darking').hide();
});


$(document).ready(function () {

$('.darking').click(function(){
	$(this).hide();
	$('.loading').hide();
});

console.log($('#fb-modal'));


//--------------------------------------
// scroll to top page
$(window).scroll(function() {
 
	if($(this).scrollTop() != 0) {
		$('#toTop').fadeIn();
	} else {
		$('#toTop').fadeOut();
	}
});
 
$('#toTop').click(function() {
	$('body,html').animate({scrollTop:0},100);
});

//-----------------------------------------

$('li.textbook').hover(function(){
	$(this).css({'background-color':'#f5f5f5', 'z-index': '10'});
	$('.textbook-table').css({'display':'block'});
}, function(){ 
	$('li.textbook').css({'background-color':'', 'z-index': '1'});
	$('.textbook-table').css({'display':'none'});
} );

$('li.gdz').hover(function(){
	$(this).css({'background-color':'#f5f5f5', 'z-index': '10'});
	$('.gdz-table').css({'display':'block'});
}, function(){ 
	$('.gdz-table').css({'display':'none'});
	$('li.gdz').css({'background-color':'', 'z-index': '1'});
} );

$('li.knowall').hover(function(){
	$(this).css({'background-color':'#f5f5f5', 'z-index': '10'});
	$('.knowall-block').css({'display':'block'});
}, function(){ 
	$('.knowall-block').css({'display':'none'});
	$('li.knowall').css({'background-color':'', 'z-index': '1'});
} );

$('li.library').hover(function(){
	$(this).css({'background-color':'#f5f5f5', 'z-index': '10'});
	$('.library-block').css({'display':'block'});
}, function(){ 
	$('.library-block').css({'display':'none'});
	$('li.library').css({'background-color':'', 'z-index': '1'});
} );

$('li.writing').hover(function(){
	$(this).css({'background-color':'#f5f5f5', 'z-index': '10'});
	$('.writing-table').css({'display':'block'});
}, function(){ 
	$('.writing-table').css({'display':'none'});
	$('li.writing').css({'background-color':'', 'z-index': '1'});
} );

//--------------------------------------
// toggle view-block-filter
$('.view-filter').click(function(){

	var oldActiveView = $(this).siblings('.active-filter').data('view');
	var smallBtn = false;
	var newActiveView = $(this).data('view');
	if(newActiveView == 'small-book-block'){
		smallBtn = true;
	}

	$('.view-filter').each(function(){
		$(this).removeClass('active-filter');
		$('.'+oldActiveView).each(function(){
			$(this).removeClass(oldActiveView).addClass(newActiveView);
			if(smallBtn){
				$(this).find('.gdz-link').find('a').removeClass('btn-sm').addClass('btn-xs');
				$(this).find('.textbook-link').find('a').removeClass('btn-sm').addClass('btn-xs');
			} else {
				$(this).find('.gdz-link').find('a').removeClass('btn-xs').addClass('btn-sm');
				$(this).find('.textbook-link').find('a').removeClass('btn-xs').addClass('btn-sm');
			}
		});
	});

	$(this).addClass('active-filter');
});


//-----------------------------------------------
//show detail-breadcrumbs
// $('.sim-link').click(function(){
// 	console.log('sim');
// 	$('.detail-breadcrumbs').toggleClass('show');

// 	if( $(this).find('span').hasClass('glyphicon-chevron-down') ){
// 		$(this).find('span').removeClass('glyphicon-chevron-down');
// 		$(this).find('span').addClass('glyphicon-chevron-up');
// 	} else {
// 		$(this).find('span').removeClass('glyphicon-chevron-up');
// 		$(this).find('span').addClass('glyphicon-chevron-down');
// 	}
// });




var clas = $('.clas-active').find('a').text();
var clasActive = '.clas-active-'+clas;

var author=$('.task').find('span.author').data('author');
var title=$('.task').find('span.title').data('title');

// вешаем handler на все заданияна странице
$('.task-number').each(function(i,val){
	$(val).on('click',{'numb':$(val).data('url'), 'parent':val}, getTask);
});

// on('click',{'numb':this.text()},getTask);

/**
 * загрузка аяксом картинки задания
 * @param  obj e обьект задани
 */
function getTask(e){
	// alert(e.data.numb);
	

	var numb= e.data.numb;
	var parent = e.data.parent;
	
	// console.log(e);
	// return;
	
	// var block = $('.panzoom-parent');


	// var url = location.href;
	// if( url.indexOf('#') > -1 ){
	// 	url = url.substr(0,window.location.href.indexOf('#'));
	// }
	
	// console.log(url);
	// return;
	
	// определяем урл задания
	var fullUrl = location.href;
	if(fullUrl.indexOf('#') != -1){
		var url = fullUrl.replace(/#.*/i,'') + '/'+numb;
	} else {
		var url = location.href + '/'+numb;
	}

	// console.log(url);

	// определяем ширину блока с заданиями
	
	// console.log(task);
	
	// var book = $('.task');
	var book = $('.panzoom-parent');

	$.ajax({
	  	type: "post",
	 	url: url,
	  	data: {'mode': ''},
	  	dataType: "html",
	  	success: function(reponse){
	  		// console.log(reponse);
	  		// console.log(e);

	  		// добавляем хэш тег задания
	  		window.location.hash = numb;

	  		$('.page-number').text(numb);
	  		
	  		// вставляем картинку
	  		$(book).html(reponse);

	  		// ширина картинки
	  		var imgWidth = $(reponse).data('width');
	  		var imgHeight = $(reponse).data('height');

	  		// console.log(imgWidth);
	  		var taskW = $('.task').width();
	
	  		// $('.task-title').show();
	  		// $('.task-separator').show();
	  		// $('#inverted-contain').show();

	  		// если картинка решения больше блока
			if( imgWidth > taskW){

				// пропорциональное изменение размеров
				resizeImage(imgWidth,imgHeight,taskW-10);
	  			
			} else {
				$('.task').find('img').css({'height':imgHeight+'px', 'width':imgWidth+'px'});
			}
	  		

	  		// добавляем alt   altBook+' завдання '+ e.data.numb
	  		
			// $(data).attr('alt','qqq');
	  		// $('img.task-img').attr('alt','Готові домашні завдання '+clas+' клас '+ title +' ' + author+' завдання '+ e.data.numb)
	  		// .attr('title','Готові домашні завдання '+clas+' клас '+ title +' ' + author+' завдання '+ e.data.numb);

	  		// красим в цвет класса
	  		$('.task-r').each(function(){
	  			$(this).find('.task-active').removeClass('task-active')
		  		.find('p').removeClass('bold');
	  		});
	  			
	  		
	  		$(parent)
		  		.parents('.task-one')
		  		.addClass('task-active')
		  		.find('p')
		  		.addClass('bold');

	  		var img = $('.task-img');
	  		var task = $('.task').width();

	  		if( img.data('width') < task ){
	  			img.width( img.data('width') );
	  		}


	  		// показываем заголовок задания
	  		// $('.task-title').find('span').text(e.data.numb);
	  		$('.task-title').css({'display':'block'});

			panZoomInit();
	  		// window.location.hash = 'live'; 
	  		
	  		// определяем позицию блока с решениям
	  		// var pos = $('#target-el').position();
	  		// var of = $('#target-el').offset();


	  		// console.log($('#target-el'));
	  		// console.log(pos);
	  		// console.log(of);

	  		// скролит к заданию
	  		// $('body,html').animate({scrollTop:480},200);
	  		// $('.task').animate({scrollTop: 0}, 400);
	  	}
	});

	
}


/**
 * [panZoomInit description]
 * @return {[type]} [description]
 */
function panZoomInit(){
	var $section = $('#inverted-contain');
	$section.find('.panzoom').panzoom({
	  $zoomIn: $section.find(".zoom-in"),
	  $zoomOut: $section.find(".zoom-out"),
	  $zoomRange: $section.find(".zoom-range"),
	  $reset: $section.find(".reset"),
	  startTransform: 'scale(0.9)',
	  increment: 0.1,
	  minScale: 1,
	  contain: 'invert'
	}).panzoom('zoom');
}

// пропорциональное изменение картинки до указанных размеров
function resizeImage(iW,iH,width)
{
    var ratio = width / iW;

    var w = Math.ceil(iW * ratio);
    var h = Math.ceil(iH * ratio);
    $('.task').find('img').css({'height': h +'px','width': w +'px'});
}


// одинаковая высота сайдбара и контента
resizeContentBlock();

function resizeContentBlock(){
	var contHeight = $('.content').outerHeight();
	var sidebarHeight = $('.sidebar').outerHeight();
	// console.log('resize');
	// console.log(sidebarHeight);
	if(contHeight > sidebarHeight){
		$('.sidebar').height(contHeight);
	}
}


//ротатор баннера адсенса
function rotate(){
	setInterval( function(){
		var src = $('.big_adsance').attr('src');
		if(src.indexOf('banner') != -1){
			$('.big_adsance').attr('src', '/images/big.jpeg');
		} else {
			$('.big_adsance').attr('src', '/images/banner.png');
		}
	}, 10000 );
}

// rotate();

// модальное окно лайков фб
// function showFb(){
	
// 	$.cookie('showFb', 'showFb', {
// 	    expires: 1,
// 	    path: '/',
// 	});

// 	$('#fb-modal').modal('show');
// }
$('#fb-modal').modal('show');
console.log($('#fb-modal'));

// проверяем по кукам 1 раз в сутки
// if( ! $.cookie('showFb') ){
// 	setTimeout(showFb, 10000);
// }
// setTimeout(showFb, 10000);

// выделение выбраного пункта из таблицы
$('td , th').hover(
	function(){
		var vertical = $(this).data('vertical');
		// console.log(vertical);
		$("[data-vertical='"+vertical+"']").each(function(i, item){
				$(item).css({'background':'#eee'}); 
			
		});
		// $(this).css({'background':'#d3e4ff'}).find('span').removeClass('small').addClass('big');
		$(this).css({'background':'#d3e4ff'});
	},
	function(){
		var vertical = $(this).data('vertical');
		$("[data-vertical='"+vertical+"']").each(function(i, item){
			$(item).css({'background':'inherit'});
		});
		// $(this).css({'background':'inherit'}).find('span').removeClass('big').addClass('small');
		$(this).css({'background':'inherit'});
	}
);



// fix menu

             
// $(window).scroll(function(){
	
//     if ( $(this).scrollTop() > 45 && $('.header').hasClass("fixed-menu") == false ){
//         $('.header').fadeOut('fast',function(){
//             $(this).addClass("fixed-menu")
//                    .fadeIn('fast');
//         });
//     } else if($(this).scrollTop() <= 45 && $('.header').hasClass("fixed-menu")) {
//         $('.header').fadeOut('fast',function(){
//             $(this).removeClass("fixed-menu")
//                    .fadeIn('fast');
//         });
//     }
// });//scroll

// slide task

$('.b-left').click(function(){
	var activeTask = $('.task-one').filter('.task-active');
	var prevTask = $(activeTask).prev('.task-one');
	if(activeTask && prevTask){
		$(prevTask).find('.task-number').click();
	}
});

$('.b-right').click(function(){
	var activeTask = $('.task-one').filter('.task-active');
	var nextTask = $(activeTask).next('.task-one');
	if(activeTask && nextTask){
		$(nextTask).find('.task-number').click();
	}
});



// disabled padination buttons
$('.yiiPager').find('.disabled').each(function(){
	$(this).find('a').click(function(e){
		e.preventDefault();
	});
});


$('[data-url=1]').click();

});