<?php $this->widget('BookWidget', array('model'=>$this->subjectModel->books)); ?>

<h1>Готові домашні завдання <?php echo $this->subjectModel->title .' '.$this->param['clas'] . ' клас'; ?></h1>
              <p><?php echo $this->subjectModel['description']; ?></p>