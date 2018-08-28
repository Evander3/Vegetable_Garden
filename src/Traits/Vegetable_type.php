<?php
declare(strict_types=1);

namespace App\Traits;

trait Vegetable_type
{
    private static $name;
    private static $surface;
    private static $ph_val;

    public function getVegeName()
    {
        return self::$name;
    }
    public function getVegeSurface()
    {
        return self::$surface;
    }
    public function getVegePh()
    {
        return self::$ph_val;
    }
}