<?php

class Curl
{
	private $_referer;
	private $_cookie;
	private $_headers;
	private $_userAgent;


	public function get( $url, $data=null, $file ){
		header("Content-Type: text/html; charset=utf-8");
		$page=array();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		// curl_setopt($ch, CURLOPT_VERBOSE, 1);

		if(!empty($data) && isset($data['login'])){
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "e_mail=$data[login]&password=$data[password]&remember=on");
		}
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
		// $html = curl_exec($ch);

		// if( $this->getReferer() ){
		// 	curl_setopt($ch, CURLOPT_REFERER, $this->_referer);
		// }

		if( isset($data['refferer']) ){
			curl_setopt($ch, CURLOPT_REFERER, $data['refferer']);
		}
		
		if($this->getCookie() ){
			curl_setopt($ch, CURLOPT_COOKIEJAR, $this->_cookie);  
			curl_setopt($ch, CURLOPT_COOKIEFILE, $this->_cookie);
		}

		if($this->getUserAgent() ){
			curl_setopt($ch, CURLOPT_USERAGENT, $this->_userAgent);
		}
		
		// if($this->headers)
		// {
		// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
		// }


		// curl_setopt($ch, CURLOPT_STDERR,  fopen('php://output', 'w'));
		

		$response = curl_exec($ch);
		if($file){
			return $response;
		}
		// return $response;
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$page['headers']= explode("\r\n", substr($response, 0, $header_size) );
		$page['body'] = substr($response, $header_size);

		$page['error'] = curl_error($ch);
		curl_close($ch);

		return $page;
	}

	// public function getFile()
	// {
	// 	set_time_limit(0);
	// 	//This is the file where we save the    information
	// 	$fp = fopen (dirname(__FILE__) . '/localfile.tmp', 'w+');
	// 	//Here is the file we are downloading, replace spaces with %20
	// 	$ch = curl_init(str_replace(" ","%20",$url));
	// 	curl_setopt($ch, CURLOPT_TIMEOUT, 50);
	// 	// write curl response to file
	// 	curl_setopt($ch, CURLOPT_FILE, $fp); 
	// 	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	// 	// get curl response
	// 	curl_exec($ch); 
	// 	curl_close($ch);
	// 	fclose($fp);
	// }

	private function getCookie(){
		if(! $this->_cookie){
			$this->_cookie = dirname(__FILE__).'/cookie.txt';
			if(!file_exists($this->_cookie)){
				touch($this->_cookie, 0777);
			}
		}

		return $this->_cookie;
	}

	private function getUserAgent(){
		if(!$this->_userAgent){
			if(file_exists(dirname(__FILE__).'/userAgent.php')){
				$all = include( dirname(__FILE__).'/userAgent.php' );
				if($all){
					$this->_userAgent = $all[array_rand($all,1)];
				}
			} else {
				$this->_userAgent='Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)';
			}
		}
		
		return $this->_userAgent;
		
	}

	private function getHeaders(){
		return null;
	}

	private function getReferer(){

		if(! $this->_referer){
			if(file_exists(dirname(__FILE__).'/referer.php')){
				$all = include( dirname(__FILE__).'/referer.php' );
				if($all){
					$this->_referer = $all[array_rand($all,1)];
				}
			} else {
				$this->_referer = 'http://google.com.ua';
			}
		}

		return true;
	}
}