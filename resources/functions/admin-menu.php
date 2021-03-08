<?php

add_action('admin_menu', function() {

    global $menu;

    // Posts
    if (isset($menu[5])) {
        $menu[5][0] = 'Media';
    }

    //Media
    if (isset($menu[10])) {
        $menu[10][0] = 'Library';
    }

    remove_menu_page( 'themes.php' );
    remove_menu_page( 'plugins.php' );
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'options-general.php' );
    remove_menu_page( 'users.php' );
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'edit.php?post_type=acf-field-group' );

    add_menu_page('Menus', 'Menus', 'manage_options', 'nav-menus.php', null, 'dashicons-clipboard', 60);

}, 1000);

