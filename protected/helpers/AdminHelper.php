<?php

class AdminHelper{

public $size=0;

public function sizeDir($path){

    if(!file_exists($path)){
        return $this->size;
    }

	$dir = opendir($path);
	while($d = readdir($dir)){
		if ($d == '.' || $d == '..') continue;

		if (is_file($path.'/'.$d)){
			$this->size += filesize($path.'/'.$d);
		}else if(is_dir($path.'/'.$d)){
			$this->sizeDir($path.'/'.$d);
		}
	}

	return $this->size;
}

public function sizeFormat($size)
{
    if($size<1024){
        return $size." bytes";
    }

    else if($size<(1024*1024)){
        $size=round($size/1024,1);
        return $size." KB";
    }

    else if($size<(1024*1024*1024)){
        $size=round($size/(1024*1024),1);
        return $size." MB";
    }

    else{
        $size=round($size/(1024*1024*1024),1);
        return $size." GB";
    }
} 



}