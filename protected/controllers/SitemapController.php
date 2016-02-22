<?php

/**
 * Генератор карты сайта
 */
class SitemapController extends Controller{

    /**
     * Метод для генерации карты сайта
     */
    public function actionIndex(){

        // echo 'a';
        // die;

        // кешируем на 24 часа или до обновления результата выборки из базы
        // if( ! $xml = Yii::app()->cache->get('sitemap') ){

            $sitemap = new Sitemap();
            $sitemap->addUrl('',Sitemap::WEEKLY, 0.2, 1409682509 );
            $sitemap->addUrl('/site/page?view=contacts',Sitemap::MONTHLY, 0.1, 1409682509 );
            $sitemap->addUrl('/site/page?view=advertiser',Sitemap::MONTHLY, 0.1, 1409682509 );
            $sitemap->addUrl('/site/page?view=rules',Sitemap::MONTHLY, 0.1, 1409682509 );
            $sitemap->addUrl('/site/page?view=rightholder',Sitemap::MONTHLY, 0.1, 1409682509 );
            $sitemap->addModels( Clas::model()->findAll(), Sitemap::WEEKLY, 0.2);
            $sitemap->addModelsWithClas( Clas::model()->with('subject')->findAll(), Sitemap::DAILY, 0.5);
            $sitemap->addModels( Book::model()->published()->findAll(), Sitemap::DAILY, 0.8);
            $sitemap->addModels( TextbookClas::model()->findAll(), Sitemap::WEEKLY, 0.2);
            $sitemap->addModelsWithOutRelation( TextbookClas::model()->findAll(), Sitemap::DAILY, 0.5);
            $sitemap->addModels( Textbook::model()->published()->findAll(), Sitemap::DAILY, 0.8);
            $xml = $sitemap->render();
            // Yii::app()->cache->set('sitemap', $xml, 3600*24);

        // } 
            
        header("Content-type: text/xml");
        echo $xml;
        Yii::app()->end();
            


    } // end function actionIndex

} // end class SitemapController

?>