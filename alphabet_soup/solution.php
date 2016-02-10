<?php
/**
 * Created by PhpStorm.
 * User: doomer
 * Date: 2/8/16
 * Time: 3:17 PM
 */

function alphabet_soup($str){
    $resultWord = '';
    foreach(explode(' ', $str) as $word){
        $splittedWord = str_split($word);
        sort($splittedWord);
        $sortedWord = implode('', $splittedWord);
        $resultWord .= $sortedWord . ' ';
    }
    echo $resultWord;
}

$output_string = "solved hello world";

alphabet_soup($output_string);
