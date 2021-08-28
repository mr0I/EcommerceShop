<?php

namespace App\Helpers;

class functions
{
    public static function calcDiscount($mainPrice , $salePrice){
        if (!is_numeric($mainPrice) || !is_numeric($salePrice)) return null;
        return round((($mainPrice - $salePrice)/$mainPrice)*100);
    }
}