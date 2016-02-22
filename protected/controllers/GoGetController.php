<?php 

/**
 * Парсинг exel данных по позициям клчевых слов
 */
class GoGetController extends Controller
{
	protected $login;
	protected $password;
	private $loginUrl = 'https://www.gogetlinks.net/login.php';
	private $myProjectsUrl = 'https://www.gogetlinks.net/my_campaigns.php';
	private $projectUrl = 'https://www.gogetlinks.net/positions.php?action=indexPage&type=positions&equivalent_comp_id=389649&domain=mygdz.pp.ua';
	private $positionFileUrl = 'https://www.gogetlinks.net/positions.php?page=0&in_page=100&comp_id=389649&domain=mygdz.pp.ua&is_yandex=true&is_google=true&filter=&date_from=2016-01-01&date_to=2016-01-15&action=export';
	protected $tmpExcelFilePath;

	public function actionIndex()
	{
		d($this->savePosition());
		

		$this->login = Yii::app()->params['auth']['go_get_links']['email'];
		$this->password = Yii::app()->params['auth']['go_get_links']['password'];

		$login = $this->curl($this->loginUrl, array('login'=>$this->login, 'password'=>$this->password));
		if(! empty($login['error'])){
			d($login['error']);
			return;
		}

		$myAllProjects = $this->curl($this->myProjectsUrl, array('refferer'=>'https://www.gogetlinks.net/index.php'));
		$myProject = $this->curl($this->projectUrl, array('refferer'=>$this->myProjectsUrl));
		
		$excelFile = $this->curl($this->positionFileUrl, array('refferer'=>$this->projectUrl), 1);
		file_put_contents($this->getTmpFile(), $excelFile);
		d($this->savePosition());


		$csv = array_map('str_getcsv', file($this->getTmpFile()));
		// $positions = str_getcsv($this->getTmpFile());
		header("Content-Type: text/html; charset=windows-1251");
		echo '<pre>';
		print_r($csv);



	}

	private function curl($url, $data=array(), $file=0){
		Yii::import('application.extensions.curl.Curl');
		$curl = new Curl();
		return $curl->get($url, $data, $file);
	}

	protected function parseExcel()
	{
		Yii::import('application.extensions.excel.ExcelReader');
		$excelReader = new ExcelReader();

		return $excelReader->read($this->getTmpFile());
	}

	protected function getTmpFile()
	{
		$this->tmpExcelFilePath = Yii::app()->basePath.'/runtime/gogetlinks/';
		if(!file_exists($this->tmpExcelFilePath)){
			mkdir($this->tmpExcelFilePath);
			chmod($this->tmpExcelFilePath,0777);
		}

		if(!file_exists($this->tmpExcelFilePath.'position.cvs')){
			touch($this->tmpExcelFilePath.'position.cvs', 0777);
			chmod($this->tmpExcelFilePath.'position.cvs',0777);
		}

		return $this->tmpExcelFilePath.'position.cvs';
	}

	protected function savePosition()
	{
		header("Content-Type: text/html; charset=windows-1251");
		$data = file($this->getTmpFile());
		$firstLine = array_shift($data);
		$datesAll = array_slice(explode(';', $firstLine), 1) ;

		$dates = [];
		foreach($datesAll as $one){
			if(!in_array(trim($one), $dates)){
				$dates[] = trim($one);
			}
		}

		$data = array_slice($data, 1);

		foreach($dates as $i => $date){
		
			foreach($data as $item){
				$lineData = explode(';', $item);
				$keyword = array_shift($lineData);
				$positions = $lineData;

				echo $keyword . ' '. $date .' - ya=' .$positions[$i] . ' g='.$positions[$i+1].'<br>';
			}

		}

	}
}