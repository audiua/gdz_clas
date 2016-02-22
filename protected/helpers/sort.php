<?php

function mysort($one, $two){
    $oneCh = firstCh($one);
    $twoCh = firstCh($two);
    if($oneCh == $twoCh){
        $oneNb = lastNumb($one);
        $twoNb = lastNumb($two);
        return $oneNb > $twoNb; 
    }

    return $oneCh < $twoCh; 
}

function firstCh($str, $sep = '_'){
    $pos = stripos($str,$sep);
    return substr($str,$pos+1,1);
}

function lastNumb($str, $sep = ' '){
    $pos = strrpos($str,$sep);
    return substr($str,$pos+1);
}