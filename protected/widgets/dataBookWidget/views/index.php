<?php

    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_adaptive_item',
        'summaryText' => '',
        // 'sorterHeader' => 'Сортувати по: ',
     //    'pager'=>array(
     //    	'header' => '',
     //    	'firstPageLabel'=>'<<',
     //        'prevPageLabel'=>'<',
     //        'nextPageLabel'=>'>',
     //        'lastPageLabel'=>'>>',
     //        'cssFile'=>false,
    	// 	'internalPageCssClass'=>'pager_li',
    	// ),
        'pager'=>'LinkPager',
    	'emptyText'=>'А нету никаких книг!',
        // 'sortableAttributes'=>array(
        //     'author'
        // ),
        'template'=>"{items}\n{pager}",
        'ajaxUpdate'=>false,
    ));
?>


