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

    'currentTheme' => env('CURRENT_THEME','light'),
    'catProductsPerPage' => env('CAT_PRODUCTS_PER_PAGE',16)

];