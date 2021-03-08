<?php

/*
 * ACF JSON Field JSON Synchronisation Configuration
 */

add_filter('acf/settings/save_json', 'acf_store_path');

add_filter('acf/settings/load_json', function(){ return [ acf_store_path() ]; });

function acf_store_path(){
    return resource_path('acf-json');
}
