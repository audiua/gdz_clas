<?php $this->widget('SubjectWidget', array('model'=>$this->clasModel->subjects)); ?>

<div class="desc">
	<h1>Готові домашні завдання <?php echo $this->param['clas'] . ' клас'; ?></h1>
	<p class="description"><?php echo $this->clasModel->description; ?> </p>
</div>