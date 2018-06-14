<?php
/**
 * Created by PhpStorm.
 * User: Lyn
 * Date: 2018/6/14
 * Time: 上午10:17
 */

namespace App\Services;

use Swoft\Rpc\Server\Bean\Annotation\Service;
use App\Lib\UserInterface;

/**
 * rpc service
 *
 * @Service(version="1")
 */
class RpcService implements UserInterface
{
    public function getUser(array $params)
    {

        return [$params, 'nihao', '19', 'nan'];
    }
}