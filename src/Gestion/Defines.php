<?php
declare(strict_types=1);

namespace App\Gestion;

class Defines
{
    private static $instance = NULL ;
    private const REFRESH_DELAY = 20;

    private const RCN_DELAY = 30;
    private const RCN_PH_MIN = 4;
    private const RCN_PH_MAX = 10;
    private const RCN_RD_BAS = 20;
    private const RCN_RD_MOY = 35;
    private const RCN_RD_HAU = 18;

    private const FLL_DELAY = 15;
    private const FLL_PH_MIN = 4;
    private const FLL_PH_MAX = 11;
    private const FLL_RD_BAS = 30;
    private const FLL_RD_MOY = 55;
    private const FLL_RD_HAU = 28;

    private const FRT_DELAY = 45;
    private const FRT_PH_MIN = 5;
    private const FRT_PH_MAX = 10;
    private const FRT_RD_BAS = 10;
    private const FRT_RD_MOY = 13;
    private const FRT_RD_HAU = 9;

    private const DELAY = 15 ;

    private function __construct() {}
    static public function create(): self
    {
        if (self::$instance === NULL)
        {
            self::$instance = new Defines();
        }
        return self::$instance;
    }
    public static function getRefreshDelay()
    {
        return self::REFRESH_DELAY;
    }
    public static function getRacineValues(): array
    {
        $res = [self::RCN_DELAY,
                self::RCN_PH_MIN,
                self::RCN_PH_MAX,
                self::RCN_RD_BAS,
                self::RCN_RD_MOY,
                self::RCN_RD_HAU];
        return $res;
    }
    public static function getFeuilleValues(): array
    {
        $res = [self::FLL_DELAY,
                self::FLL_PH_MIN,
                self::FLL_PH_MAX,
                self::FLL_RD_BAS,
                self::FLL_RD_MOY,
                self::FLL_RD_HAU];
        return $res;
    }
    public static function getFruitValues(): array
    {
        $res = [self::FRT_DELAY,
                self::FRT_PH_MIN,
                self::FRT_PH_MAX,
                self::FRT_RD_BAS,
                self::FRT_RD_MOY,
                self::FRT_RD_HAU];
        return $res;
    }
}