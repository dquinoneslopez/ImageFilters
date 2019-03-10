<?php

require 'classes/picture.php';

/**
 * displayObjectsArray: Displays an array containing Picture objects
 *
 * @param  array $arr Array with the objects 
 *
 * @return void
 */

function displayObjectsArray($arr){

    foreach ($arr as $picture) {
        
        $picture->toString();

    }

}

/**
 * createObjectsArray: Displays an array containing Picture objects
 *
 * @param  array $arr Asociative array
 *
 * @return array $output Objects array
 */

function createObjectsArray($arr){

    $output = array();

    foreach ($arr as $key => $value) {
        
        $output[] = new Picture($value);
        
    }

    return $output;

}

/**
 * applyFilters: "Applies" the corresponding filters to a picture 
 *
 * @param  array $arr1 Array with the original pictures
 * @param  array $arr2 Array with the pictures's filters to modify
 *
 * @return array $output Array with the picture's new filters
 */

function applyFilters($arr1, $arr2){

    $output = array();
    $exists = false;

    foreach ($arr2 as $picture2) {
        
        foreach ($arr1 as $picture1) {
            
            if ($picture1->getFileName() === $picture2->getFileName()) {
                
                $exists = true;
                $picture1->setFilters($picture2->getFilters());
                $output[] = $picture1;

                echo "- Picture \"" . $picture1->getFileName() . "\" filters modified!\n";

                break;
                
            } 

            $exists = false;

        }

        if (!$exists) {

            echo "ERROR: Picture \"" . $picture2->getFileName() . "\" doesn't exists!\n";

        }
        
    }

    echo "\n";

    return $output;

}