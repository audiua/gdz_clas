<?php

class SlugHelper{

	public static function subjectSlug($subject){

		$sub_slug = array(
			'математика'=>'math',
			'українська мова'=>'lang-ua',
			'українська література'=>'lit-ua',
			'англійська мова'=>'lang-en',
			'основи здоров\'я'=>'health',
			'природознавство'=>'nature',
			'етика'=>'etika',
			'інформатика'=>'info',
			'світова література'=>'lit-w',
			'географія'=>'geogr',
			'алгебра'=>'algebra',
			'геометрія'=>'geom',
			'фізика'=>'fizika',
			'біологія'=>'bio',
			'історія україни'=>'history-ua',
			'хімія'=>'him',
		);

		$title = str_replace("'", "\'", $title);
		$title = strtolower($title);

		if(array_key_exists($title, $sub_slug)){
			return $sub_slug[$title];
		} 

		return '';

	}
}

