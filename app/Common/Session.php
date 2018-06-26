<?php
/**
 * Created by PhpStorm.
 * User: Lyn
 * Date: 2018/6/13
 * Time: 下午5:29
 */

namespace App\Common;


class Session
{
    /**
     * 获取设置的session_id
     *
     * @param array $session
     * @return null|string
     */
    public static function getSession(array $session):?string
    {
        return @$session[@config('service.session_id')];
    }

    /**
     * 获取登录userId
     *
     * @return int
     */
    public static function getUserId():int
    {
        return $_SESSION['user']['id'] ?? 0;
    }

    /**
     * 获取登录userName
     *
     * @return string
     */
    public static function getUserName():string
    {
        return $_SESSION['user']['userName'] ?? '';
    }

    /**
     * 获取登录email
     *
     * @return string
     */
    public static function getUserEmail():string
    {
        return $_SESSION['user']['email'] ?? '';
    }
}