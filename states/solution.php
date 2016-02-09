<?php
/**
 * Created by PhpStorm.
 * User: doomer
 * Date: 2/9/16
 * Time: 4:04 PM
 */

class States{
    private $fileContentsArray;
    private $statesArray = [];
    private $searchBirdString;

    function __construct(){
        $this->fileContentsArray = file('states.txt');
        foreach($this->fileContentsArray as $stateRow){
            $tempArr = explode(", ", rtrim($stateRow));
            $this->statesArray[array_shift($tempArr)] = $tempArr;
        }
    }

    function listStates(){
        $this->printResultArray(array_keys($this->statesArray));
    }

    function searchBirds($firstLetter){
        $this->searchBirdString = $firstLetter;
        $statesValues = array_values($this->statesArray);
        $birdsArray = array_column($statesValues, 1);
        $filteredArray = array_filter($birdsArray, function($bird){
            return strcasecmp($this->searchBirdString, substr($bird, 0, 1)) === 0;
        });
        $this->printResultArray(array_unique($filteredArray));
    }

    function printResultArray($resultArray){
        print(implode(",<br/>", $resultArray));
    }
}

$states = new States();
//$states->listStates();
$states->searchBirds('b');