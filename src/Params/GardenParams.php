<?php
declare(strict_types=1);

namespace App\Params;

class GardenParams
{
    private static $instance = NULL ;
    private $post;

    private function __construct() {}

    static public function create(): self
    {
        if (self::$instance === NULL)
        {
            self::$instance = new GardenParams();
        }
        return self::$instance;
    }

    // not to use, no longer set Params in session, check getParams
    public function setParamsInSession(array &$post): void
    {
        foreach ($post as $key => &$val)
        {
            switch (substr($key, -3)) {
                case '_sf':
                    $_SESSION[substr($key,0,-3)]['surf']=intval($val);
                case '_ph':
                    $_SESSION[substr($key,0,-3)]['ph']=intval($val);
                case '_tp':
                    $_SESSION[substr($key,0,-3)]['type']=$val;
            }
        }
        unset($key, $value);
    }

    public static function getParams(array $input): array
    {
        $post = array();
        foreach ($input as $key => &$val)
        {
            switch (substr($key, -3)) {
                case '_sf':
                    $post[substr($key,0,-3)]['surf']=intval($val);
                case '_ph':
                    $post[substr($key,0,-3)]['ph']=intval($val);
                case '_tp':
                    $post[substr($key,0,-3)]['type']=$val;
            }
        }
        
        echo '<pre>';
        var_dump($post);
        echo '</pre>';
        unset($key, $value);
        return $post;
    }
    
}
