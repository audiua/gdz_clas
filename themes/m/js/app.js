$(document).ready(function(){$(document).ajaxSend(function(event,request,settings){$('.task-title').show();$('.task-separator').show();$('#inverted-contain').show();$('.loading').show();$('.darking').show();$('body,html').animate({scrollTop:300},100);});$(document).ajaxComplete(function(event,request,settings){var contHeight=$('.content').outerHeight();var sidebarHeight=$('.sidebar').outerHeight();if(contHeight>sidebarHeight){$('.sidebar').height(contHeight);}$('.loading').hide();$('.darking').hide();});$('.b-left').click(function(){var activeTask=$('.task-one').filter('.task-active');var prevTask=$(activeTask).prev('.task-one');if(activeTask&&prevTask){$(prevTask).find('.task-number').click();}});$('.b-right').click(function(){var activeTask=$('.task-one').filter('.task-active');var nextTask=$(activeTask).next('.task-one');if(activeTask&&nextTask){$(nextTask).find('.task-number').click();}});$('.darking').click(function(){$(this).hide();$('.loading').hide();});$('.task-number').each(function(i,val){$(val).on('click',{'numb':$(val).data('url'),'parent':val},getTask);});function getTask(e){var numb=e.data.numb;var parent=e.data.parent;console.log(numb);var fullUrl=location.href;if(fullUrl.indexOf('#')!=-1){var url=fullUrl.replace(/#.*/i,'')+'/'+numb;}else{var url=location.href+'/'+numb;}console.log(url);var book=$('.task');$.ajax({type:"post",url:url,data:{'mode':''},dataType:"html",success:function(reponse){window.location.hash=numb;$('.page-number').text(numb);$(book).html('<div class="title">Розв’язання: №'+numb+'</div><div class="clearfix"></div><div class="separator"></div>'+reponse).show();var imgWidth=$(reponse).data('width');var imgHeight=$(reponse).data('height');var taskW=$('.task').width();if(imgWidth>taskW){resizeImage(imgWidth,imgHeight,taskW-10);}else{$('.task').find('img').css({'height':imgHeight+'px','width':imgWidth+'px'});}$('.task-one').filter('.task-active').removeClass('task-active');$(parent).parents('.task-one').addClass('task-active');var img=$('.task-img');var task=$('.task').width();if(img.data('width')<task){img.width(img.data('width'));}$('.task-title').css({'display':'block'});}});}function panZoomInit(){var $section=$('#inverted-contain');$section.find('.panzoom').panzoom({$zoomIn:$section.find(".zoom-in"),$zoomOut:$section.find(".zoom-out"),$zoomRange:$section.find(".zoom-range"),$reset:$section.find(".reset"),startTransform:'scale(0.9)',increment:0.1,minScale:1,contain:'invert'}).panzoom('zoom');}function resizeImage(iW,iH,width){var ratio=width/iW;var w=Math.ceil(iW*ratio);var h=Math.ceil(iH*ratio);$('.task').find('img').css({'height':h+'px','width':w+'px'});}});
$(document).ready(function () {
        $('.nav li.dropdown').hover(function () {
            $(this).addClass('open');
        }, function () {
            $(this).removeClass('open');
        });
    });

    $('ul.dropdown-menu [data-toggle=dropdown]').on('mouseover', function (event) {
        // Avoid following the href location when clicking
        event.preventDefault();
        // Avoid having the menu to close when clicking
        event.stopPropagation();
        // If a menu is already open we close it
        //$('ul.dropdown-menu [data-toggle=dropdown]').parent().removeClass('open');
        // opening the one you clicked on
        $(this).parent().addClass('open');

        var menu = $(this).parent().find("ul");
        var menupos = menu.offset();

        var newpos;
        if ((menupos.left + menu.width()) + 30 > $(window).width()) {
            newpos = -menu.width();
        } else {
            newpos = $(this).parent().width();
        }

        menu.css({left: newpos});

    });

    $('a.dropdown-toggle').on('click', function (event) {
        window.location = $(this).prop("href");
    });