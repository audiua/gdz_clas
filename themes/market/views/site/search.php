<div class="info">результат поиска</div> 
<div class="view-filters">
	<span class="view-filter glyphicon glyphicon-th-large gray active-filter" data-view='middle-book-block'></span> 
	<span class="view-filter glyphicon glyphicon-th gray " data-view='small-book-block'></span>  
	<span class="view-filter glyphicon glyphicon-th-list gray" data-view='list-book-block'></span> 
</div>

<!-- <div class="clear"></div> -->

<div class="book-list">
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_search',
    'summaryText' => '{start}-{end} з {count} найдених',
    'sorterHeader' => 'Сортувати по: ',
    'pager'=>array(
    	'header' => '',
    	'firstPageLabel'=>'<<',
        'prevPageLabel'=>'<',
        'nextPageLabel'=>'>',
        'lastPageLabel'=>'>>',
        'cssFile'=>false,
		'internalPageCssClass'=>'pager_li',
	),
	'emptyText'=>'А нету никаких книг!',
    'sortableAttributes'=>array(
        'author',
        'gdz_clas_id',
    ),
));
?>
</div>
