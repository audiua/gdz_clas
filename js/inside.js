// $(document).ready(function () {

// console.log('slug');
// // аякс трансли имени статьи
// $('#Knowall_title').focusout(function(){

//     var title = '';
//     if( $('#Knowall_title').val() ){
//         title = $('#Knowall_title').val();
//     }

//     if(title){
// 	    $.post('/ajax/default/translit', {'title':title}, function(responce){
// 	        if(responce.success){
// 	        	console.log(responce);
// 	        	console.log($('#Knowall_slug'));
// 	        	console.log(responce.translit);
// 	            $('#Knowall_slug').val(responce.translit);
// 	            if( $('#Knowall_slug').hasClass('error') ){
// 	                $('#Knowall_slug').removeClass('error');
// 	                $('.slug_error').each(function(){
// 	                    $(this).remove();
// 	                });
// 	            }
// 	        } else {
// 	            $('#Knowall_slug').val(responce.translit);
// 	            $('.name_error').each(function(){
// 	                $(this).remove();
// 	            });
// 	            $('#Knowall_slug').after('<span class="help-inline error slug_error">' + responce.error + '</span>');
// 	            $('#Knowall_slug').addClass('error');
// 	        }
// 	    }, 'json');
//     }

// });


// });