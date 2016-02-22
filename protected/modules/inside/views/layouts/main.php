<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">


        <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>

        <?php 

            $path = Yii::app()->theme->basePath;
            $mainAssets = Yii::app()->AssetManager->publish($path);
            // Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/jquery.cookie.js');
            // Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/app.js');
            // Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/less.js');
            // Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/panzoom.js');
            // Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/bootstrap3.2.0.min.js');
            // Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/bootstrap-switch.min.js');
            // Yii::app()->getClientScript()->registerCssFile($mainAssets.'/css/bootstrap-switch.min.css');
            // Yii::app()->getClientScript()->registerCssFile($mainAssets.'/css/app.css');

         ?>


        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/inside.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/fullcalendar/fullcalendar.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/fullcalendar/fullcalendar.print.css" media='print'>
        
        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
        <!-- <script src="<?php echo Yii::app()->baseUrl; ?>/js/inside.js"></script> -->
        
        <title>
            <?php echo CHtml::encode($this->pageTitle); ?>
        </title>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>

        <div class="wrap">

            <?php $this->renderPartial('/layouts/header'); ?>


           <!--  <div class="black"></div>
            <div class="red"></div>
            <div class="black"></div> -->

            <div class="content">
               
                
                <?php echo $content; ?>
            </div>
            
            <?php // $this->renderPartial('/layouts/sidebar'); ?>
            
            <div class="clear"></div>

            <div class="footer">
                <div class="black"></div>
                <div class="red"></div>
                <div class="black"></div>
                <?php $this->renderPartial('/layouts/footer'); ?>
            </div>

        </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type='text/javascript' src="<?php echo Yii::app()->baseUrl; ?>/css/fullcalendar/lib/moment.min.js"></script>
    <script type='text/javascript' src="<?php echo Yii::app()->baseUrl; ?>/css/fullcalendar/fullcalendar.min.js"></script>
    </body>
</html>