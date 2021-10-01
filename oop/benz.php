<?php

include_once 'cars.php';

class benz extends cars
{
    private static $color;

    public static function Color($color = null)
    {
        benz::$color = !empty($color) ? $color : cars::getColor();
    }

    public static function gColor()
    {
        benz::Color();
        return benz::$color;
    }

    
    


}

//$thiss = new benz();
print_r("color = ");
print_r(benz::gColor());
