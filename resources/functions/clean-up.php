<?php

add_action('init', function() {

    remove_action('wp_head', 'print_emoji_detection_script', 7 );
    remove_action('wp_print_styles', 'print_emoji_styles');
    

    //remove unnecessary stuff
    add_action('wp_footer', function() {
        wp_deregister_script('wp-embed');
        wp_deregister_script('password-strength-meter');
    });

});