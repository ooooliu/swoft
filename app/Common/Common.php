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

    public static function getViewsPath(string $file):string
    {
        return \config('file.admin_path').$file;
    }
}