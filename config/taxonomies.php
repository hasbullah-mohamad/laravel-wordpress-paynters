<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Taxonomies
    |--------------------------------------------------------------------------
    |
    | Define following the formatting of the register_taxonomy() function
    | @link https://codex.wordpress.org/Function_Reference/register_taxonomy
    |
    | taxonomy => [Name, [post-types], [arguments,...]]
    |
    */

    'project_category' => ['Category', ['project'], [ 
        'public' => true ]
    ],


    'project_region' => ['Region', ['project'], [ 
        'public' => true ]
    ],

    'project_tag' => ['Tag', ['project'], [ 
        'public' => true ]
    ],
    
    'award_awarder' => ['Awarders', ['award'], [ 
        'public' => true ]
    ],


];