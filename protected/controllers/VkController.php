<?php


class VkController extends Controller{

	const CLIENT_ID = '4774972';
	const ACCESS_TOKEN = '47fdd92a4908b8e57213eb978c14488560494f0e4b6289e5f7ac7723308c8a06c23d8a7bba8666369f4f4';

	// флаг что есть публ
	private $_p=false;

	public function actionIndex($hash=null){

		// if($hash !== '5b717f9e843de36448780e90f00942fc'){
		// 	Yii::app()->end();
		// }
		$model = $this->getGdz();
		// $img =  $model->getThumb('origin');
		// d();

		Yii::import('ext.vkontakte-php-sdk-master.src.Vkontakte');
		// require_once('../src/Vkontakte.php');

		
		
		if($model){

			$str = '';


			// if($this->_p){
			// 	$str .= $this->normalDate(time()).' обновлено гдз ';
			// } else {
			// }	
			$str .= $this->normalDate($model->publish_date).' добавлено підручник ';

			$str .= $model->clas->name . ' клас ' . $model->subject->name . ' ' . $model->author  . ' ' . $model->year  . 'рік ' . Yii::app()->createAbsoluteUrl( $model->getUrl() );

			$accessToken = self::ACCESS_TOKEN;
			$vkAPI = new Vkontakte(['access_token' => $accessToken]);
			$r = $vkAPI->api('wall.post',array(
			    'owner_id' => -86651632,
			    'message' => $str,
			    'from_group' => 1
			));
		}

		Yii::app()->end();
	}

	// https://api.vk.com/method/users.get?user_id=66748&v=5.40&access_token=533bacf01e11f55b536a565b57531ac114461ae8736d6506a3


	private function getGdz(){

		$criteria = new CDbCriteria;
		$criteria->condition = 'public=1';
		$criteria->addCondition('vk_publish_time=0');
		$criteria->addCondition('publish_date<'.time());
		$gdz = Textbook::model()->find($criteria);
		// d($gdz);

		if($gdz){
			// $this->_p = true;
			$gdz->vk_publish_time = time();
			// if( ! $gdz->update()){
			// 	die($gdz->gerErrors);
			// }
			$gdz->update();
		
		}
		return $gdz;

		// return null;

	}

	private function normalDate($date){
	    $month=array(
	    'January'=>"Січня",'February'=>"Лютого",'March'=>"Березня",
	    'April'=>"Квітня",'May'=>"Травня",'June'=>"Червня",
	    'July'=>"Липня",'August'=>"Серпня",'September'=>"Вересня",
	    'October'=>"Жовтня",'November'=>"Листопада",'December'=>"Грудня");

	    $a=$month[date("F", $date)];
	    $b=date("j",$date);
	    $c=date("Y", $date);
	    $t = date('H:i', $date);
	    return $b.' '.$a." ".$c.' року о '.$t;
	}

}





