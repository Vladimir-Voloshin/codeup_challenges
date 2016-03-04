<?php
/**
 * Created by PhpStorm.
 * User: doomer
 * Date: 2/11/16
 * Time: 9:34 AM
 */

class Palindrom {
    function checkString($palindromeString){
        $strippedString = $palindromeString;
        $reversedString = strrev($palindromeString);
        return strcasecmp($reversedString, $strippedString);
    }
}

$palindrome = new Palindrom();
$checkString = "Аргинтина манит негра";
var_dump($palindrome->checkString($checkString));
$checkString = "No 'x' in 'Nixon'";
var_dump($palindrome->checkString($checkString));

