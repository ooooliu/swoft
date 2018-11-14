<?php
/**
 * Created by PhpStorm.
 * User: Lyn
 * Date: 2018/6/6
 * Time: 上午11:25
 */

namespace App\Common;

class Common
{

    /**
     * 获取视图全路径
     *
     * @param string $file
     * @return string
     */
    public static function getViewsPath(string $file):string
    {
        return \config('file.admin_path').$file;
    }

    /**
     * 验证电子邮件
     *
     * @param $email
     * @return bool
     */
    public static function checkMail($email):bool
    {
        //定义正则表达式
        $check_mail="/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";

        return preg_match($check_mail, $email) ? true : false;
    }

    /**
     * 判断是不是json
     *
     * @param $string
     * @return bool
     */
    public static function isJson($string):bool
    {
        return !is_null(@json_decode($string));
    }
}