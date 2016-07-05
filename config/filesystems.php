<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. A "local" driver, as well as a variety of cloud
    | based drivers are available for your choosing. Just store away!
    |
    | Supported: "local", "ftp", "s3", "rackspace"
    |
    */

    'default' => 'repositorio',

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => 's3',

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'repositorio' => [
            'driver' => 'local',
            'root' => storage_path('app/public/repositorio'),
        ],

        'noticia/archivo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/noticias'),
        ],

        'noticia/img' => [
            'driver' => 'local',
            'root' => public_path('img/noticias'),
            'visibility' => 'public',
        ],

        'evento/archivo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/eventos'),
        ],

        'evento/img' => [
            'driver' => 'local',
            'root' => public_path('img/eventos'),
            'visibility' => 'public',
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => 'your-key',
            'secret' => 'your-secret',
            'region' => 'your-region', 
            'bucket' => 'your-bucket',
        ],

        'userPhotos' => [
            'driver' => 'local',
            'root' => public_path('img/users'),
            'visibility' => 'public',
        ],

        'acuerdos' => [
            'driver' => 'local',
            'root' => storage_path('app/public/acuerdos'),
            'visibility' => 'public',
        ],

        'slideImages' => [
            'driver' => 'local',
            'root' => public_path('img/img_include/slideImages'),
            'visibility' => 'public',
        ],


    ],

];
