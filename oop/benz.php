<?php

include_once 'cars.php';

class benz extends cars
{
    public static function getColors($pp='')
    {
        return parent::getColor($pp);
    }
}

//$thiss = new benz();
print_r("color = ");
print_r(benz::getColors(1));
print_r(benz::getColor(2));
