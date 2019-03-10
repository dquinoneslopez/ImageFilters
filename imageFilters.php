<?php

require 'include/functions.php';

// Let's create some preexisting pictures first
$original_pictures = array();

$picture1_array = array(
    'file' => 'picture#1',
    'filters' => array('blur'=>'2')
);

$picture2_array = array(
    'file' => 'picture#2',
    'filters' => array()
);

$picture3_array = array(
    'file' => 'picture#3',
    'filters' => array()
);

$picture1 = new Picture($picture1_array);
$picture2 = new Picture($picture2_array);
$picture3 = new Picture($picture3_array);

array_push($original_pictures, $picture1, $picture2, $picture3);

// Now, let's read the config file and "apply" the filters

if (file_exists('config.php')) {
    
    header("Content-Type: text/plain");

    echo "=============================================\n";
    echo "Original pictures\n";
    echo "=============================================\n\n";
    
    echo displayObjectsArray($original_pictures);    

    echo "\n\n=============================================\n";
    echo "Filters to apply to pictures\n";
    echo "=============================================\n\n";

    $configs = include('config.php');
    $filters = createObjectsArray($configs);
    echo displayObjectsArray($filters);

    echo "\n\n=============================================\n";
    echo "New pictures\n";
    echo "=============================================\n\n";

    echo displayObjectsArray(applyFilters($original_pictures, $filters));

} else {
    
    echo("Config file doesn\'t exists.");

}
