<?php
/**
 * Created by PhpStorm.
 * User: Lyn
 * Date: 2018/6/7
 * Time: 下午5:14
 */

namespace App\Services;


class UserService
{
    /**
     * get token
     *
     * @return string
     */
    public static function token()
    {
        return sha1(time().rand(1000, 9999));
    }
}