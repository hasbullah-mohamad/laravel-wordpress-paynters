<?php 

add_action('admin_init', function(){

    error_reporting(E_ERROR);
    
    //Projects
    add_action('save_post_project', 'save_project', 100);
    add_action('delete_project_category', 'delete_project_category', 100);
    add_action('wp_ajax_update-menu-order', 'update_projects_order');

    //Awards
    add_action('save_post_award', 'save_award', 100);
    add_action('edit_award_awarder', 'save_awarder', 100);

});

