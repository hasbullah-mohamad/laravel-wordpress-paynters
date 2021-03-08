<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Post Types
    |--------------------------------------------------------------------------
    |
    | Define following the formatting of the register_post_type() function
    | @link https://codex.wordpress.org/Function_Reference/register_post_type
    |
    | post-type => [Post Type, [arguments,...]]
    |
    */

    'project' => ['project', [
        'public' => true,
        'menu_icon' => 'dashicons-admin-multisite',
        'supports' => ['title', 'editor', 'thumbnail'],
        'rewrite' => [
            'with_front' => false,
            'slug' => 'projects',
        ],
        'labels' => [
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'name' => 'Projects',
            'singular_name' => 'Project',
        ],
    ]],

    'award' => ['award', [
        'public' => true,
        'menu_icon' => 'dashicons-awards',
        'supports' => ['title'],
        'rewrite' => [
            'with_front' => false,
            'slug' => 'awards',
        ],
        'labels' => [
            'add_new_item' => 'Add New Award',
            'edit_item' => 'Edit Award',
            'name' => 'Awards',
            'singular_name' => 'Award',
        ],
    ]],



];