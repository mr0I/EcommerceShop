<?php

namespace App\Helpers;

class functions
{
    public static function calcDiscount($mainPrice , $salePrice){
        if (!is_numeric($mainPrice) || !is_numeric($salePrice)) return null;
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
}