<?php 

$controller = $this->controller->id == 'site'?'':'/textbook/'; 
$category = $this->controller->id == 'site'?'Гдз':'Підручник'; 
$clas = $this->controller->id == 'site'?$data->clas->slug:$data->clas->name; 
$clasSlug = $this->controller->id == 'site'?$data->clas->slug:$data->clas->slug; 

?>



<div class="item col-lg-3 col-md-4 col-sm-4 col-xs-12"> 

	<?php

	echo CHtml::link(


	CHtml::image( 
		$data->getThumb(140,200,'resize'),
		$category.' ' . $clas . ' клас ' . $data->subject->title . ' ' .  $data->author, 
		array(
			'class'=>'', 
			'title'=>$category.' для ' . $clas . ' класу ' . $data->subject->title . ' ' .  $data->author . ' '.  $data->year,
			'width'=>'140',
			'heigth'=>'200'
		)
	), array( $controller.$clasSlug.'/'.$data->subject->slug.'/'.$data->slug) ); ?>


	<?= CHtml::link('<div>'.$data->author.' '.$data->title.' '.$clas.' клас</div>', $controller.$clasSlug.'/'.$data->subject->slug.'/'.$data->slug); ?>
		<?php 
			if( !empty($data->properties) ){
				echo '<div class="desc">'.$data->properties.'</div>';
			}
		?>
</div>

					
