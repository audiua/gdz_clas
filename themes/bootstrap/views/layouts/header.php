<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <base href="<?php  echo Yii::app()->createAbsoluteUrl('/'); ?>">
    
    <meta name="description" content="<?php echo CHtml::encode($this->description); ?>" />
    <meta name="keywords" content="<?php echo CHtml::encode($this->keywords); ?>" />
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/app.css">
    <!-- <link rel="stylesheet/less" type="text/css" href="<?php // echo Yii::app()->theme->baseUrl; ?>/less/app.less" /> -->
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>