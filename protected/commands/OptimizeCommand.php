<?php


/**
 * Class OptimizeCommand
 */
class OptimizeCommand extends CConsoleCommand {

	$apiKey = '9rbdd1doh6to113cwl7uoaolchhty5hi';
	$apiSecret = 'g95gm96itv5ffi1qc5djugcipf274dgt';
    $url = 'http://upload.issuu.com/1_0';


    public function actionIndex(){
    	echo 'oops';

    	$textbooks = Textbook::model()->findAll();
    	foreach($textbooks as $textbook){
    		$pdf = $textbook->getImgDir(false).'textbook.pdf';
    		if(!file_exists($pdf)){
    			echo 'no file '.$pdf ."\n";
    			continue;
    		}

	        // $cfile = curl_file_create('resource/test.png','image/png','testpic'); // try adding

	        // Create a CURLFile object / oop method
	        $cfile = new CURLFile($pdf,'application/pdf','textbook'); // uncomment and use if the upper procedural method is not working.
	        // Assign POST data
	        $data = array(
	        	'api_key' => $this->apiKey,
	        	'file' => $cfile,
	        	'name'=>uniqid(),
	        	'title'=>$textbook->id,
	        	'type'=>00200,
        	);

        	ksort($data);
        	$signature = $this->apiSecret;
        	foreach($data as $key => $value){
        		$signature .=$key.$value;
        	}

        	$data['signature'] = md5($signature);

	        $curl = curl_init();
	        curl_setopt($curl, CURLOPT_URL, $this->url);
	        curl_setopt($curl, CURLOPT_USERAGENT,'Opera/9.80 (Windows NT 6.2; Win64; x64) Presto/2.12.388 Version/12.15');
	        curl_setopt($curl, CURLOPT_HTTPHEADER,array('User-Agent: Opera/9.80 (Windows NT 6.2; Win64; x64) Presto/2.12.388 Version/12.15','Referer: http://someaddress.tld','Content-Type: multipart/form-data'));
	        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // stop verifying certificate
	        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($curl, CURLOPT_POST, true); // enable posting
	        curl_setopt($curl, CURLOPT_POSTFIELDS, $imgdata); // post images
	        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // if any redirection after upload
	        $r = curl_exec($curl);
	        curl_close($curl);

	        print_r($r);

	        break;
    		
    	}

        
    }

}
