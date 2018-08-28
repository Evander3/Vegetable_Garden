<?php
declare(strict_types=1);

namespace App\Params;

class GardenParams
{
    private $post;

    // public function __construct($post)
    // {
    //     $this->post = $post;
    // }

    public function setInSession(array &$post): void
    {
        foreach ($post as $key => &$val)
        {
            $val = intval($val);
            $_SESSION[$key]=$val;
            // if (substr($key, -3) == '_sf') {
                // array_push
            // } elseif (substr($key, -3) == '_ph') {
            // } elseif (substr($key, -3) == '_tp') {
            // } else {
            //     // prolly should add some exception right ?
            //     break;
            // }
        }
        unset($key);
        unset($value);
    }
    
}
