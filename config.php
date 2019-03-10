<?php

// Filters:
//  - resize: [pixels_size] -> 0 means no change
//  - negate: [0, 1]
//  - grayscale: [0, 1]
//  - brightness: [-255, 0, 255] -> 0 means no change
//  - contrast: [-255, 0, 255] -> 0 means no change
//  - blur: [num_pixels] -> 0 means no change

return array(
    'picture#1' => array(
        'file' => 'picture#1',
        'filters' => array(
            'resize' => 100,
            'blur' => 1
        )
    ),
    'picture#2' => array(
        'file' => 'picture#2',
        'filters' => array(
            'resize' => 100
        )
    ),
    'picture#3' => array(
        'file' => 'picture#3',
        'filters' => array(
            'resize' => 100,
            'blur' => 2,
            'grayscale' => 1
        )
    ),
    'picture#4' => array(
        'file' => 'picture#4',
        'filters' => array(
            'resize' => 100,
            'blur' => 2,
            'grayscale' => 1
        )
    )
);