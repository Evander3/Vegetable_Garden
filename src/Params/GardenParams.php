<?php
declare(strict_types=1);

namespace App\Params;

class GardenParams
{
    private static $post;

    public function __construct($post)
    {
        self::$post = $post;
    }

    public function extractGardenParams(): void
    {
        foreach (self::$post as $key => &$val)
        {
            $val = intval($val);
            $_SESSION[$key]=$val;
            // if (substr($key, -3) == '_sf') {
            // } elseif (substr($key, -3) == '_ph')
            // {
            // } elseif (substr($key, -3) == '_tp')
            // {
            // } else
            // {
            //     // prolly should add some exception right ?
            //     break;
            // }
        }
        unset($key);
        unset($value);
    }
    
}
