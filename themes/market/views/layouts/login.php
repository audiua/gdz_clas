<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

        <link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:700,400' rel='stylesheet' type='text/css'>

        <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>

        <?php 

            $path = Yii::app()->theme->basePath;
            $mainAssets = Yii::app()->AssetManager->publish($path);
            Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/jquery.cookie.js');
            Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/app.js');
            Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/less.js');
            Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/bootstrap3.2.0.min.js');
            Yii::app()->getClientScript()->registerCssFile($mainAssets.'/css/bootstrap3.2.0.min.css');

         ?>

        <link rel="stylesheet/less" type="text/css" href="<?php  echo Yii::app()->theme->baseUrl; ?>/less/app.less" />
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
    <div class="form-page">
        <?php echo $content; ?>
    </div>
    </body>
</html>