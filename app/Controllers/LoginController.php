<?php
/**
 * Created by PhpStorm.
 * User: Lyn
 * Date: 2018/6/6
 * Time: 上午11:17
 */

namespace App\Controllers;


use App\Common\Error;
use App\Common\Session;
use App\Middlewares\AuthTokenMiddleware;
use App\Services\UserService;
use Swoft\Core\Coroutine;
use Swoft\Http\Message\Bean\Annotation\Middleware;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
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
            $param['email'] = $request->post('email', '');
            $param['password'] = $request->post('password', '');
            //获取客户端cookie
            $param['session'] = $request->getCookieParams();

            try {
                $data = UserService::loginUser($param);
                return response()->json($data);
            }
            catch (\Exception $e) {
                return Error::responseError($e);
            }
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
        $session_id = Session::getSession($request->getCookieParams());

        UserService::loginOutUser($session_id);

        return response()->redirect('/login');
    }

    /**
     * @RequestMapping("/register")
     * @View(template="admin/register")
     * @Middleware(AuthTokenMiddleware::class)
     *
     * @param Request $request
     * @return array
     */
    public function register(Request $request)
    {
        if($request->getMethod() == 'POST'){
            $param['email'] = $request->post('email', '');
            $param['user_name'] = $request->post('user_name', '');
            $param['user_password'] = $request->post('user_password', '');
            $param['confirm_password'] = $request->post('confirm_password', '');

            try {
                $res = UserService::addUser($param);
                if($res > 0){
                    $data = [
                        'status' => 200,
                        'msg' => '注册成功'
                    ];
                }else{
                    $data = [
                        'status' => 300,
                        'msg' => '网络不稳定,请稍后再试'
                    ];
                }
                return response()->json($data);
            }
            catch (\Exception $e) {
                return Error::responseError($e);
            }
        }else{
            $title = '用户注册';
            $css = 'login';

            return compact('title', 'css');
        }
    }
}