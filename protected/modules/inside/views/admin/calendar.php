<?php
$this->breadcrumbs=array(
  Yii::t('messages','Events'),
);
?>
 
<script type='text/javascript'>
 
$(document).ready(function() {



    function updateItem(item){
       

        // alert(item.url);

        $.ajax({
                type: "POST",
                url: item.url,
                data: {
                    'public_time': item.start,
                    'calendar': true
                },
                success: function(response){
                    console.log(response.result);
                }
        });

    }
 
    $('#calendar').fullCalendar({

        firstDay: 1,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        monthNames: ['Январь','Февраль','Март','Апрель','Май','οюнь','οюль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        monthNamesShort: ['Янв.','Фев.','Март','Апр.','Май','Июнь','Июль','Авг.','Сент.','Окт.','Ноя.','Дек.'],
        dayNames: ["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"],
        dayNamesShort: ["ВС","ПН","ВТ","СР","ЧТ","ПТ","СБ"],
        buttonText: {
            today: "Сегодня",
            month: "Месяц",
            week: "Неделя",
            day: "День"
        },
        editable: true,

        events: [
     
            <?php
                $colors = array(
                    'Book'=>'#32CD32',//LimeGreen
                    'TextbookBook'=>'#4169E1',//RoyalBlue
                    'Knowall'=>'#FF8C00',//DarkOrange
                    'Writing'=>'#FF69B4',//HotPink
                    'LibraryBook'=>'#A020F0',//Purple
                );
                $title = array(
                    'Book'=>'gdz',//LimeGreen
                    'TextbookBook'=>'textbook',//RoyalBlue
                    'Knowall'=>'knowall',//DarkOrange
                    'Writing'=>'writing',//HotPink
                    'LibraryBook'=>'lib-book',//Purple
                );

                foreach ($model as $i => $event) {
                    $clas = get_class($event);
                    
                    // if(strtotime( $event->public_time) < time() ){
                    //     $color_bg = '#fafafa';
                    // } else {
                    //     $color_bg = '#fff';
                    // }
                        
                    $color = $colors[$clas];
                
                    echo "{";
                    echo "id:'" . $clas . '_'.$event->id . "',";
                    echo "className:'" . $clas . "',";
                    echo "title: '" .$title[$clas] . ' #'. $event->id .   "',";
                    echo "start: '" . date('Y-m-d H:i',strtotime($event->public_time)) . "',";
                    echo "allDay: false,";
                    echo "color: '". $color."',";
                    // echo "borderColor  : '". $color_bg."',";
                    echo "url: '" . Yii::app()->createUrl("inside/".$clas."/update", array("id"=>$event->id)) . "'";
                    echo "},";
                }
            ?>
         
        ],
        timeFormat: 'HH(:mm)',

        eventDrop: function( event, delta, revertFunc ) {
            var now = moment();
            
            if( moment(now).isAfter(event.start._i) ){
                revertFunc();

            } else {
                var id = event.id.replace(/[a-zA-Z_]+/igm, "");
                $.ajax({
                    url: ("http://mygdz.pp.ua/inside/"+event.className+"/updateFromCalendar/"+id),
                    data: ({
                        public_time: event.start.format("YYYY-M-D HH:mm")
                    }),
                    type: "POST",
                    success: function (data) {
                        $('#calendar').fullCalendar( 'refetchEvents' );
                        alert("Збережено");
                    },
                    error: function (xhr, status, error) {
                        alert("Не збережено");
                        revertFunc();
                    }
                });
            }


        }
    });


});

</script>
 
<div id='calendar'></div>