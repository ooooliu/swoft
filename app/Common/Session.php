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
    public static function getSession(array $session):string
    {
        return @$session[@config('service.session_id')];
    }
}