<?php

class cars
{

    private static $name = 'benz';
    private static $color = 'red';
    private static $price = '1200000';

    protected static function setName($name)
    {
        cars::$name = $name;
    }

    protected static function getName()
    {

        return cars::$name;
    }

    protected static function setColor($color)
    {
        self::$color = $color;
    }

    protected static function getColor()
    {
        return cars::$color;
    }

    protected static function setPrice($price)
    {
        cars::$price = $price;
    }

    protected static function getPrice()
    {
        return self::$price;
    }
}
