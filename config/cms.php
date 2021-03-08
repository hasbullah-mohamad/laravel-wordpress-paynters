<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Keys and Salts
    |--------------------------------------------------------------------------
    |
    | These are required to be unique to ensure secure
    | default Wordpress authentication and form submission.
    |
    */

    'auth_key' => 'G8jZx8ehVqzXthHKu2LuVgVR1kTeULJn9Efcag2hRdw=',
    'secure_auth_key' => 'gQ3ntSHjUXDUx2BOSakv6bpbnYgcSq74SApqGIrl37Y=',
    'logged_in_key' => '81ejvGQPpyL8jEb8yfrenO03c0D0amXeXSqhNHdcJBM=',
    'nonce_key' => 'k5Mg/dAATSc7QDq2F0lKTTcQTEbQykulMr+1p1hsDFo=',
    'auth_salt' => 'Q7Wx9QNRtBhRtSMKsNt60mVKYAk0uxm4YIgZwy4KX94=',
    'secure_auth_salt' => 'rHK8IBNCWYCSh3mlOqoDGWazDjcfMtRr3dIA7f+vDkw=',
    'logged_in_salt' => 'Lh91z8kTh+mrEcqkOOKmaprxSXrV98LrYluFStj8lds=',
    'nonce_salt' => 'l4Q6f8PsjEYeNgqIxvvrMXY40ICYDlkIviPd6lfswd0=',

    /*
    |--------------------------------------------------------------------------
    | Wordpress Table Database Prefix
    |--------------------------------------------------------------------------
    |
    | This is required if no global MySQL database prefix is defined.
    |
    */
    'db_prefix' => 'wp_',

    /*
    |--------------------------------------------------------------------------
    | Wordpress Installation Directory
    |--------------------------------------------------------------------------
    |
    | Directory within public where Wordpress is installed.
    |
    */
    'directory' => 'cms',

    /*
    |--------------------------------------------------------------------------
    | Content Directory
    |--------------------------------------------------------------------------
    |
    | Directory within public where plugins and uploads will be contained.
    |
    */
    'content_directory' => 'content',

    /*
    |--------------------------------------------------------------------------
    | Object Cache
    |--------------------------------------------------------------------------
    */

    'object_cache' => [
        /*
         * Use Laravel Cache for persistence
         */
        'persistent' => true,

        /*
         * Cache Prefix
         */
        'prefix' => 'wp',

        /*
         * Default cache expiration in minutes
         */
        'expiration' => 1440,

        /*
         * Allow Wordpress flush functions to flush persistent cache
         */
        'allow_persistent_flush' => true,

        /*
         *  Wordpress data groups not to be persisted
         */
        'not_persisted' => [
            //
        ],
    ],

];