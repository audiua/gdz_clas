<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button tupe="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
				<span class="sr-only">Menu</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php echo ($this->action->id != 'index') ? CHtml::link('Gdz'.Yii::app()->params['clas'].'clas', '/', array('class'=>'navbar-brand')): '<span class="navbar-brand">Gdz-'.Yii::app()->params['clas'].'-Clas</span>' ?>
		</div>

		<div class="collapse navbar-collapse navbar-ex1-collapse">
		    <ul class="nav navbar-nav">
		        <li class="menu-item dropdown <?= ($this->id == 'site') ? ' active' : '' ; ?>">
		            <a href="/" class="dropdown-toggle " data-toggle="dropdown">ГДЗ <?=Yii::app()->params['clas'] ?> клас<b class="caret"></b></a>
		            <ul class="dropdown-menu">
		            <?php foreach( Clas::model()->findAll() as $clas ) : 
		            	if($clas->slug != Yii::app()->params['clas']){
		            		continue;
		            	}
		            ?>
		                <li class="menu-item">
		                    <?php foreach( $clas->subject as $subject ) : ?>
		                        <li class="menu-item ">
		                            <a href="<?=Yii::app()->baseUrl.'/'.$clas->slug . '/' . $subject->slug; ?>"><?= $subject->title; ?></a>
		                        </li>
	                        <?php endforeach; ?>
		                </li>
	                <?php endforeach; ?>
		            </ul>
		        </li>
		        <li class="menu-item dropdown <?= ($this->id == 'textbook') ? ' active' : '' ; ?>">
		            <a href="/textbook" class="dropdown-toggle " data-toggle="dropdown">Підручники <?=Yii::app()->params['clas'] ?> клас<b class="caret"></b></a>
		            <ul class="dropdown-menu">
		            <?php foreach( TextbookClas::model()->findAll() as $clas ) : 
		            	if($clas->slug != Yii::app()->params['clas']){
		            		continue;
		            	}
		            ?>
		                <li class="menu-item">
		                    <?php foreach( $clas->getSubject() as $subject ) : ?>
		                        <li class="menu-item ">
		                            <a href="/textbook/<?=$clas->slug . '/' . $subject->slug; ?>"><?= $subject->name; ?></a>
		                        </li>
	                        <?php endforeach; ?>
		                </li>
	                <?php endforeach; ?>
		            </ul>
		        </li>
		    </ul>
		</div>
	</div>
</nav>

<script>
    
</script>

<style>/*
    Created on : 04.02.2014, 18:54:37
    Author     : seyfer
*/

.dropdown-menu {
    margin: 0 0 0;
}

.navbar-brand {
    color: #68b604 !important;
}

.dropdown-submenu{
    position:relative;
}
.dropdown-submenu>.dropdown-menu{
    top:0;left:100%;
    margin-top:-6px;margin-left:-1px;
    -webkit-border-radius:0 6px 6px 6px;
    -moz-border-radius:0 6px 6px 6px;
    border-radius:0 6px 6px 6px;
}
.dropdown-submenu:hover>.dropdown-menu{
    display:block;
}
.dropdown-submenu>a:after{
    display:block;
    content:" ";
    float:right;
    width:0; height:0;
    border-color:transparent;
    border-style:solid;
    border-width:5px 0 5px 5px;
    border-left-color:#cccccc;
    margin-top:5px;
    margin-right:-10px;
}
.dropdown-submenu:hover>a:after{
    border-left-color:#ffffff;
}
.dropdown-submenu.pull-left{
    float:none;
}
.dropdown-submenu.pull-left>.dropdown-menu{
    left:-100%;
    margin-left:10px;
    -webkit-border-radius:6px 0 6px 6px;
    -moz-border-radius:6px 0 6px 6px;
    border-radius:6px 0 6px 6px;
}</style>

<?php  
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'tagName'=>'ol',
    'separator'=>' ',
    'homeLink'=>false,
    'inactiveLinkTemplate'=>'<li class="active">{label}</li>',
    'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
    'htmlOptions'=>array ('class'=>'breadcrumb')
));
?>
