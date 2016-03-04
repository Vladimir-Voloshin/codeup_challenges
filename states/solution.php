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
    const SEARCH_FOR_BIRDS    = 1;
    const SEARCH_FOR_CAPITALS = 0;

    function __construct(){
        $this->fileContentsArray = file($_SERVER['DOCUMENT_ROOT'] . '/states/states.txt');
        foreach($this->fileContentsArray as $stateRow){
            $tempArr = explode(", ", rtrim($stateRow));
            $this->statesArray[array_shift($tempArr)] = $tempArr;
        }
    }

    function listStates(){
        $this->printResultArray(array_keys($this->statesArray));
    }

    function searchEntities($firstLetter, $useColumn){
        $this->searchBirdString = $firstLetter;
        $statesValues = array_values($this->statesArray);
        $birdsArray = array_column($statesValues, $useColumn);
        $filteredArray = array_filter($birdsArray, function($bird){
            return strcasecmp($this->searchBirdString, substr($bird, 0, 1)) === 0;
        });
        $this->printResultArray(array_unique($filteredArray));
    }

    private function printResultArray($resultArray){
        print(implode(",<br/>", $resultArray) . "<br/>");
    }
}

$states = new States();
$states->listStates();
$states->searchEntities('a', States::SEARCH_FOR_CAPITALS);
$states->searchEntities('b', States::SEARCH_FOR_BIRDS);
