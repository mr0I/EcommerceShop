<?php

namespace App\Helpers;

class functions
{
    public static function calcDiscount($mainPrice , $salePrice){
        return round((($mainPrice - $salePrice)/$mainPrice)*100);
    }
}