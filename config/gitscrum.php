<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable GitScrum
    |--------------------------------------------------------------------------
    |
    | Set this field to false to disable the GitScrum service.
    | You would probably replace that in your local configuration to get a readable output.
    |
    */
    'enable' => env('GITSCRUM_ENABLE', true),
    'api_base' => env('GITSCRUM_API', 'https://api.gitscrum.com/'),
    'storage_disk' => env('STORAGE_DISK', 'local'),

    'api_id' => env('API_ID', ''),
    'project_key' => env('PROJECT_KEY', ''),

];
