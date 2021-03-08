<?php 

add_action('admin_init', function(){
    admin_register_field('careers_email', 'Careers Email');
});

function admin_register_field($name, $title) {
    register_setting( 'general', $name, 'esc_attr' );
    add_settings_field(
        "{$name}_id",
        '<label>' . __( $title , $name ) . '</label>',
        admin_text_field($name),
        'general'
    );
}

function admin_text_field($name) {
    return function() use($name) {
        $value = get_option($name, '' );
        echo '<input type="text" name="'.$name.'" value="' . esc_attr( $value ) . '" />';
    };
}