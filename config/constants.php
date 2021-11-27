<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User Defined Variables
    |--------------------------------------------------------------------------
    |
    | This is a set of variables that are made specific to this application
    | that are better placed here rather than in .env file.
    | Use config('your_key') to get the values.
    |
    */

    'catProductsPerPage' => env('CAT_PRODUCTS_PER_PAGE',16),
    'siteUrl' => env('SITE_URL','http://127.0.0.1:8000/')

];