<?php
/**
 * Created by PhpStorm.
 * User: Lyn
 * Date: 2018/6/26
 * Time: 下午2:27
 */

namespace App\Common;


use Swoft\Redis\Redis;

class Predis
{

    private static $predis;

    public static function getPredis()
    {
        if (!(self::$predis instanceof self)) {
            self::$predis = new Redis();
        }
        return self::$predis;
    }

    public static function set($key, $value, $expire = null)
    {
        self::getPredis();
        $value = is_array($value) ? json_encode($value) : $value;
        $expire = $expire ? $expire * 60 : $expire;
        return self::$predis->set($key, $value, $expire);
    }

    public static function get($key)
    {
        self::getPredis();
        $data = self::$predis->get($key);
        return Common::isJson($data) ? json_decode($data, true) : $data;
    }

    public static function __callStatic($method, $args)
    {
        self::getPredis();
        self::$predis->$method(...$args);
    }
}