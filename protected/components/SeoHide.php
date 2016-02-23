<?php

class SeoHide{
	public static function link( $url, $title, $options=array() ){
		$strOptions = '';
		foreach ( $options as $k=>$v ) {
			$strOptions.= ' '.$k.'="'.$v.'"';
		}
	
		// return '<a href="#" data-key="'.base64_encode($url).'" data-type="href" '.$strOptions.'>'.$title.'</a>';
		return '<a href="#" data-key="'.base64_encode( $url ).'"'.$strOptions. ' data-type="href">'.$title.'</a>';
	}
}