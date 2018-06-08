<?php
/**
 * Created by PhpStorm.
 * User: Lyn
 * Date: 2018/6/8
 * Time: 上午9:23
 */

namespace App\Middlewares;


use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Swoft\Bean\Annotation\Bean;
use Swoft\Http\Message\Middleware\MiddlewareInterface;
use Swoft\Redis\Redis;

/**
 * @Bean()
 * @uses AuthTokenMiddleware
 */
class AuthTokenMiddleware implements MiddlewareInterface
{
    /**
     * Process an incoming server request and return a response, optionally delegating
     * response creation to a handler.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Server\RequestHandlerInterface $handler
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \InvalidArgumentException
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        //验证用户身份
        $info = $request->getQueryParams();

        if(!empty($info['token'])){
            $redis = new Redis();
            $user_name = $redis->get($info['token']);
            if(!empty($user_name)){
                return $handler->handle($request);
            }
        }
        return response()->redirect('/login');
    }
}