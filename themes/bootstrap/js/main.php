<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo CHtml::encode($this->description); ?>" />
        <meta name="keywords" content="<?php echo CHtml::encode($this->keywords); ?>" />
        <base href="<?php  echo Yii::app()->createAbsoluteUrl('/'); ?>">
        <link rel="canonical" href="<?php echo $this->canonical; ?>">

        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
        <!-- <link rel="stylesheet" href="<?php // echo Yii::app()->theme->baseUrl; ?>/css/bootstrap3.2.0.min.css"> -->
        <link rel="stylesheet/less" type="text/css" href="<?php  echo Yii::app()->theme->baseUrl; ?>/less/app.less" />
        <link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:700,400' rel='stylesheet' type='text/css'>
        <!-- <link href="<?php // echo Yii::app()->theme->baseUrl; ?>/css/font" rel='stylesheet' type='text/css'> -->
        
        <?php Yii::app()->getClientScript()->registerCoreScript('jquery', CClientScript::POS_END); ?>

        <?php 

            $path = Yii::app()->theme->basePath;
            $mainAssets = Yii::app()->AssetManager->publish($path);
            Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/jquery.cookie.js', CClientScript::POS_END);
            Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/app.js', CClientScript::POS_END);
            Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/less.js');
            Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/bootstrap3.2.0.min.js', CClientScript::POS_END);
            Yii::app()->getClientScript()->registerCssFile($mainAssets.'/css/bootstrap3.2.0.min.css');
            // Yii::app()->getClientScript()->registerCssFile($mainAssets.'/css/app.css');

         ?>

        <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/1.7.3/less.min.js"></script> -->
        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
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

        <div class="top-menu">
        </div>

        <div class="wrap">
            <div class="header">
                <?php $this->renderPartial('//layouts/menu'); ?>
                <?php // $this->renderPartial('//layouts/header'); ?>
            </div>
                <div class="separator"></div>
           <!--  <div class="black"></div>
            <div class="red"></div>
            <div class="black"></div> -->

            <div class="content">
               

            <!-- <div class="h-direct">
                <img src="/images/hor.jpeg"> 
            </div> -->        


                
                <?php echo $content; ?>
            </div>
            <div class="sidebar">
                <?php $this->renderPartial('//layouts/sidebar'); ?>
            </div>
            <div class="clear"></div>

            <div class="footer">
                <div class="black"></div>
                <div class="red"></div>
                <div class="black"></div>
                <?php $this->renderPartial('//layouts/footer'); ?>
            </div>

        </div>


    </body>
</html>