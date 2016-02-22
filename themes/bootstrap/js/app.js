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




$(document).ready(function () {

$('.darking').click(function(){
	$(this).hide();
	$('.loading').hide();
});

// вешаем handler на все заданияна странице
$('.task-number').each(function(i,val){
	$(val).on('click',{'numb':$(val).data('url'), 'parent':val}, getTask);
});

function getTask(e){
	// alert(e.data.numb);
	

	var numb= e.data.numb;
	var parent = e.data.parent;
	
	console.log(numb);
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

	console.log(url);

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
	  		$('.task-one').filter('.task-active').removeClass('task-active');
	  			
	  		
	  		$(parent)
		  		.parents('.task-one')
		  		.addClass('task-active');

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



// модальное окно лайков фб
// function showFb(){
	
// 	$.cookie('showFb', 'showFb', {
// 	    expires: 1,
// 	    path: '/',
// 	});

// 	$('#fb-modal').modal('show');
// }

// проверяем по кукам 1 раз в сутки
// if( ! $.cookie('showFb') ){
// 	setTimeout(showFb, 10000);
// }

});