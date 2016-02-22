<?php

$k=0;
$active = '';
$color = '';
if(isset($this->params['task'])){
	$taskActive = $this->params['task'];
} else {
	$taskActive = 0;
}

$tmp = [];
foreach( $model as $i => $one ){
	if(is_array($one)){
		$tmp[$i]=$one;
		continue;
	}

	if((int)$one == $taskActive && !isset($this->params['section'])){
		$this->controller->pageTitle .= ' завдання - '.(int)$one;
		$active = 'bold clas-active-'.$this->params['clas'];
		$color = 'clas-color-'.$this->params['clas'];
	}

	if($k==0){
		echo '<div class="task-r">';
	}

	// echo '<div class="col-md-1 no task-one">';

	echo CHtml::link( '<div class="task-one task-one-'.$this->params['clas'].' ' .$active.' "><p class="'.$color.'">'.(int)$one.'</p></div>', array('/'.$this->params['clas'].'/'
		.$this->params['subject'].'/'
		.$this->params['book'].'/'.(int)$one),['title'=>$this->controller->subjectModel->title . ' ' . $this->controller->bookModel->author . ' завдання '.(int)$one]);

	// echo '</div>';
	$k++;
	$active = '';
	$color = '';
	if($k==12){
		echo '</div>';
		$k=0;
	}

}
if($k != 0){
 echo '</div>';
}


if(!empty($tmp)){
	$this->controller->widget('NestedWidget', ['model'=>$tmp]);
}


// print_r($tmp);
// die;







?>


						
						