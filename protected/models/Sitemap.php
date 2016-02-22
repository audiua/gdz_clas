<?php

 
class Sitemap
{
    const ALWAYS = 'always';
    const HOURLY = 'hourly';
    const DAILY = 'daily';
    const WEEKLY = 'weekly';
    const MONTHLY = 'monthly';
    const YEARLY = 'yearly';
    const NEVER = 'never';
 
    protected $items = array();
 
    /**
     * @param $url
     * @param string $changeFreq
     * @param float $priority
     * @param int $lastmod
     */
    public function addUrl($url, $changeFreq=self::DAILY, $priority=0.5, $lastMod=0)
    {
        $host = Yii::app()->request->hostInfo;
        $item = array(
            'loc' => $host . $url,
            'changefreq' => $changeFreq,
            'priority' => $priority
        );
        if ($lastMod){
            $item['lastmod'] = $this->dateToW3C($lastMod);
 		}

        $this->items[] = $item;
    }
 
    /**
     * @param CActiveRecord[] $models
     * @param string $changeFreq
     * @param float $priority
     */
    public function addModels($models, $changeFreq=self::DAILY, $priority=0.5){
        $host = Yii::app()->request->hostInfo;
        $time=time();

        // print_r($models);
        // die;
        foreach ($models as $model){

            // print_r($model);

            //  добаляем в карту только опубликованные
            if( isset($model->created) ){
                if( $time < $model->created ){
                    continue;
                }
            }

            $item = array(
                'loc' => $host . $model->getUrl(),
                'changefreq' => $changeFreq,
                'priority' => $priority
            );
 
            if ($model->hasAttribute('update_time')){
                $item['lastmod'] = $this->dateToW3C($model->update_time);

            }
 
            $this->items[] = $item;
        }
    }
 
    /**
     * @return string XML code
     */
    public function render()
    {
        $dom = new DOMDocument('1.0', 'utf-8');
        $urlset = $dom->createElement('urlset');
        $urlset->setAttribute('xmlns','http://www.sitemaps.org/schemas/sitemap/0.9');
        foreach($this->items as $item)
        {
            $url = $dom->createElement('url');
 
            foreach ($item as $key=>$value)
            {
                $elem = $dom->createElement($key);
                $elem->appendChild($dom->createTextNode($value));
                $url->appendChild($elem);
            }
 
            $urlset->appendChild($url);
        }
        $dom->appendChild($urlset);
 
        return $dom->saveXML();
    }
 
    protected function dateToW3C($date)
    {
    	
        if (is_int($date)){
            $dateTime = new DateTime(date('Y-m-d\TH:i:sP',$date));
            return $dateTime->format(DateTime::W3C);
        } else {
            $dateTime = new DateTime(date('Y-m-d\TH:i:sP',$date));
            return $dateTime->format(DateTime::W3C);
        }
    }


    /**
     * @param CActiveRecord[] $models
     * @param string $changeFreq
     * @param float $priority
     */
    public function addModelsWithClas($models, $changeFreq=self::DAILY, $priority=0.5){
        $host = Yii::app()->request->hostInfo;
        foreach ($models as $subject){

            // if($model->subject){
            //     foreach($model->subject as $subject){

                    $item = array(
                        'loc' => $host . $subject->getUrl(Yii::app()->params['clas']),
                        'changefreq' => $changeFreq,
                        'priority' => $priority
                    );


                    if ($subject->hasAttribute('update_time')){
                        $item['lastmod'] = $this->dateToW3C((int)$subject->update_time);
                    }

                    $this->items[] = $item;

            //     }
            // }
        }
    }

    /**
     * @param CActiveRecord[] $models
     * @param string $changeFreq
     * @param float $priority
     */
    public function addModelsWithOutRelation($models, $changeFreq=self::DAILY, $priority=0.5){
        $host = Yii::app()->request->hostInfo;
        foreach ($models as $model){


            foreach($model->getSubject() as $subject){

                $item = array(
                    'loc' => $host . $subject->getUrl($model->slug),
                    'changefreq' => $changeFreq,
                    'priority' => $priority
                );


                if ($subject->hasAttribute('update_time')){
                    $item['lastmod'] = $this->dateToW3C((int)$subject->update_time);
                }

                $this->items[] = $item;

            }
            
        }
    }
}