<?php

include_once 'cars.php';

class benz extends cars
{
    public static function gColor()
    {
        return cars::getColor();
    }
}

//$thiss = new benz();
print_r("color = ");
print_r(benz::gColor());
