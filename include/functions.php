<?php

require 'classes/picture.php';

//=================================================
// Displays an array containing Picture objects
// - $arr: array with the objects 
//=================================================

/**
 * displayObjectsArray
 *
 * @param  mixed $arr
 *
 * @return void
 */
function displayObjectsArray($arr){

    foreach ($arr as $picture) {
        
        $picture->toString();

    }

}

//=================================================
// Displays an array containing Picture objects
// - $arr: asociative array
// - $output: objects array
//=================================================

/**
 * createObjectsArray
 *
 * @param  mixed $arr
 *
 * @return void
 */
function createObjectsArray($arr){

    $output = array();

    foreach ($arr as $key => $value) {
        
        $output[] = new Picture($value);
        
    }

    return $output;

}

//==========================================================
// "Applies" the corresponding filters to a picture 
// - $arr1: array with the original pictures
// - $arr2: array with the pictures's filters to modify
// - $output: objects array with the pictures's new filters
//==========================================================

/**
 * applyFilters
 *
 * @param  mixed $arr1
 * @param  mixed $arr2
 *
 * @return void
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