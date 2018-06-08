<?php
/**
 * Created by PhpStorm.
 * User: Lyn
 * Date: 2018/6/6
 * Time: 上午11:17
 */

namespace App\Controllers;


use App\Middlewares\AuthTokenMiddleware;
use App\Services\UserService;
use Swoft\Core\Coroutine;
use Swoft\Http\Message\Bean\Annotation\Middleware;
use Swoft\Http\Message\Cookie\Cookie;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Redis\Redis;
use Swoft\View\Bean\Annotation\View;

/**
 * Class LoginController
 * @Controller("login")
 */
class LoginController extends BaseController
{
    /**
     * @RequestMapping("/login")
     * @View(template="admin/login")
     *
     * @param Request $request
     * @return array
     */
    public function login(Request $request)
    {
        if($request->getMethod() == 'POST'){
            $user_name = $request->post('user_name', '');
            $user_password = $request->post('user_password', '');

            $token = UserService::token();
            if(!empty($user_name) && !empty($user_password)){
                //创建登录key,添加用户信息到redis
                $redis = new Redis();
                $redis->set($token, $user_name, 60);

                $data = [
                    'status' => 200,
                    'msg' => '登录成功',
                    'token' => $token
                ];
            }else{
                $data = [
                    'status' => 300,
                    'msg' => '账号或密码错误'
                ];
            }
            return response()->json($data);
        }else{
            $title = '用户登录';
            $css = 'login';
            return compact('title', 'css');
        }
    }

    /**
     * @RequestMapping("/loginOut")
     * @Middleware(AuthTokenMiddleware::class)
     *
     * @param Request $request
     * @return \Psr\Http\Message\ResponseInterface|\Swoft\Http\Message\Server\Response
     */
    public function loginOut(Request $request)
    {
        $token = $request->query('token', '');

        if(!empty($token)){
            $redis = new Redis();
            $redis->delete($token);
        }
        return response()->redirect('/login');
    }

    /**
     * @RequestMapping("/register")
     * @View(template="admin/register")
     *
     * @param Request $request
     * @return array
     */
    public function register(Request $request)
    {
        if($request->getMethod() == 'POST'){

        }else{
            $title = '用户注册';
            $css = 'login';
            return compact('title', 'css');
        }
    }
}