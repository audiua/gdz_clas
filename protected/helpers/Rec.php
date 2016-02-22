<?php

class Rec{

	protected static $tree;

	// возвращает дерево папки в виде асоц. массива    
	public static function r($dir='.'){
		
		$all = scandir($dir);

		// return $all;
		// print_r($all);
		// die;
		// return $all;

		if(count($all > 2)){
			foreach ($all as $i => $item) {

				if( $item{0} == '.' ){
					continue;
				}

				// echo $item;

				if( is_dir($item) ){

					Rec::$tree[$item] = $this->rec($dir .'/'.$item);
					// $tree_path=$tree[$item];
					// $tree_path[] = $this->rec($item);
				}

				if(is_file($item)){
					Rec::$tree[] = $item;
				}

			}
		}

		// if(empty($tree) || !isset($tree)){
		// 	return [];
		// }

		return Rec::$tree;
	}



}

