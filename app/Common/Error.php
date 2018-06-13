<?php
/**
 * Created by PhpStorm.
 * User: Lyn
 * Date: 2018/6/13
 * Time: 下午4:29
 */

namespace App\Common;


class Error
{
    /**
     * 返回try catch信息
     * @param \Exception $e
     * @return \Psr\Http\Message\ResponseInterface|\Swoft\Http\Message\Server\Response
     */
    public static function responseError(\Exception $e)
    {
        return response()->json([
            'status' => $e->getCode(),
            'msg' => $e->getMessage()
        ]);
    }
}