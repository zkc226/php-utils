<?php


namespace utils;


class TimeUtils
{

    /**
     * 返回标准格式的日志，形如：2016-10-27T17:51:58.794+0800
     *
     * @param string $ts
     * @param int    $decimals
     *
     * @return string
     */
    public static function StdDateTime($ts = '', $decimals = 3)
    {
        // 此方法可以在不设置ini_set('precision', 16)的情况下保持足够多的精度因为分开算了
        //list($ms1, $s1) = explode(' ', microtime());
        //str_replace('___', sprintf('%03d', $ms1 * 1000), date('Y-m-d\TH:i:s.___O', $s1));
        if (empty($ts)) {
            $ts = sprintf('%.' . $decimals . 'f', microtime(true));
        }

        list($s1, $ms1) = explode('.', $ts);

        return str_replace('___', $ms1, date('Y-m-d\TH:i:s.___O', $s1));
    }

    public static function ESDateTime($ts = '', $decimals = 6)
    {
        return self::StdDateTime($ts, $decimals);
    }

    public static function timestamp($decimals = 6)
    {
        return floatval(sprintf('%.' . $decimals . 'f', microtime(true)));
    }

}