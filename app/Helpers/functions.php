<?php

namespace App\Helpers;

use App\ShortLink;
use Illuminate\Support\Str;

class functions
{
    public static function calcDiscount($mainPrice , $salePrice){
        if (!is_numeric($mainPrice) || !is_numeric($salePrice)) return null;
        if ($mainPrice == '0') return null;

        return round((($mainPrice - $salePrice)/$mainPrice)*100);
    }

    public static function getIP(){
        if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) ) {
            $http_x_headers = explode( ',', $_SERVER['HTTP_CLIENT_IP'] );
            return $http_x_headers[0];
        } else if ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
            $http_x_headers = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );
            return $http_x_headers[0];
        } else if ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
            $http_x_headers = explode( ',', $_SERVER['REMOTE_ADDR'] );
            return $http_x_headers[0];
        } else {
            $http_x_headers = explode( ',', $_SERVER['AR_REAL_IP'] );
            return $http_x_headers[0];
        }
    }

    public static function clearInputs($input){
        return trim(htmlentities(addslashes($input)));
    }

    public static function generateShortLink($slug){
        $input['link'] = url('/') .'/product/'. $slug;
        $input['code'] = (Str::random(6));

        $isDuplicate = ShortLink::where('link',$input['link'])->first();
        if ($isDuplicate === null){
            ShortLink::create($input);
            $result = ShortLink::where('code',$input['code'])->first();
            $shortLink = url('/') .'/sl/'. $result->code;
        } else {
            $shortLink = url('/') .'/sl/'. $isDuplicate->code;
        }

        return $shortLink;
    }
}