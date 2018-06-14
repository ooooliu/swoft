<?php
/**
 * Created by PhpStorm.
 * User: Lyn
 * Date: 2018/6/14
 * Time: 上午10:25
 */

namespace App\Lib;


interface UserInterface
{
    /**
     * 获取用户信息
     *
     * @param $params
     * @return array
     */
    public function getUser(array $params);
}