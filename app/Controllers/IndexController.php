<?php
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers;


use App\Middlewares\AuthTokenMiddleware;
use App\Services\UserService;
use Swoft\App;
use Swoft\Core\Coroutine;
use Swoft\Http\Message\Bean\Annotation\Middleware;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Log\Log;
use Swoft\Redis\Redis;
use Swoft\View\Bean\Annotation\View;
use Swoft\Contract\Arrayable;
use Swoft\Http\Server\Exception\BadRequestException;
use Swoft\Http\Message\Server\Response;

/**
 * Class IndexController
 * @Controller("admin")
 * @Middleware(AuthTokenMiddleware::class)
 */
class IndexController
{
    /**
     * @RequestMapping("/")
     * @View(template="admin/index")
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $title = '用户主页';

        $user = UserService::getUser();

        return compact('title', 'user');
    }

    /**
     * @RequestMapping("/tables")
     * @View(template="admin/tables")
     *
     * @param Request $request
     * @return array
     */
    public function tables(Request $request)
    {
        $title = '表格';
        $css = 'widgets';

        return compact('title', 'css');
    }

    /**
     * @RequestMapping("/calendar")
     * @View(template="admin/calendar")
     *
     * @param Request $request
     * @return array
     */
    public function calendar(Request $request)
    {
        $title = '日历';
        $css = 'widgets';

        return compact('title', 'css');
    }

    /**
     * @RequestMapping("/form")
     * @View(template="admin/form")
     *
     * @param Request $request
     * @return array
     */
    public function form(Request $request)
    {
        $title = '表单';
        $css = 'widgets';

        return compact('title', 'css');
    }

    /**
     * @RequestMapping("/chart")
     * @View(template="admin/chart")
     *
     * @param Request $request
     * @return array
     */
    public function chart(Request $request)
    {
        $title = '图表';
        $css = 'chart';

        return compact('title', 'css');
    }

    /**
     * @RequestMapping("/table_list")
     * @View(template="admin/table_list")
     *
     * @param Request $request
     * @return array
     */
    public function tableList(Request $request)
    {
        $title = '文字列表';
        $css = 'widgets';

        return compact('title', 'css');
    }

    /**
     * @RequestMapping("/table_img")
     * @View(template="admin/table_img")
     *
     * @param Request $request
     * @return array
     */
    public function tableImg(Request $request)
    {
        $title = '图文列表';
        $css = 'widgets';

        return compact('title', 'css');
    }

    /**
     * @RequestMapping("/error")
     * @View(template="admin/error")
     *
     * @param Request $request
     * @return array
     */
    public function error(Request $request)
    {
        $title = '404错误';
        $css = 'widgets';

        return compact('title', 'css');
    }

    /**
     * show view by view function
     */
    public function templateView(): Response
    {
        $name = 'Swoft View';
        $notes = [
            'New Generation of PHP Framework',
            'Hign Performance, Coroutine and Full Stack'
        ];
        $links = [
            [
                'name' => 'Home',
                'link' => 'http://www.swoft.org',
            ],
            [
                'name' => 'Documentation',
                'link' => 'http://doc.swoft.org',
            ],
            [
                'name' => 'Case',
                'link' => 'http://swoft.org/case',
            ],
            [
                'name' => 'Issue',
                'link' => 'https://github.com/swoft-cloud/swoft/issues',
            ],
            [
                'name' => 'GitHub',
                'link' => 'https://github.com/swoft-cloud/swoft',
            ],
        ];
        $data = compact('name', 'notes', 'links');

        return view('index/index', $data);
    }

    /**
     * @RequestMapping()
     * @View(template="index/index")
     * @return \Swoft\Contract\Arrayable|__anonymous@836
     */
    public function arrayable(): Arrayable
    {
        return new class implements Arrayable
        {
            /**
             * @return array
             */
            public function toArray(): array
            {
                return [
                    'name'  => 'Swoft',
                    'notes' => ['New Generation of PHP Framework', 'Hign Performance, Coroutine and Full Stack'],
                    'links' => [
                        [
                            'name' => 'Home',
                            'link' => 'http://www.swoft.org',
                        ],
                        [
                            'name' => 'Documentation',
                            'link' => 'http://doc.swoft.org',
                        ],
                        [
                            'name' => 'Case',
                            'link' => 'http://swoft.org/case',
                        ],
                        [
                            'name' => 'Issue',
                            'link' => 'https://github.com/swoft-cloud/swoft/issues',
                        ],
                        [
                            'name' => 'GitHub',
                            'link' => 'https://github.com/swoft-cloud/swoft',
                        ],
                    ]
                ];
            }

        };
    }

    /**
     * @RequestMapping()
     * @return Response
     */
    public function absolutePath(): Response
    {
        $data = [
            'name'  => 'Swoft',
            'notes' => ['New Generation of PHP Framework', 'Hign Performance, Coroutine and Full Stack'],
            'links' => [
                [
                    'name' => 'Home',
                    'link' => 'http://www.swoft.org',
                ],
                [
                    'name' => 'Documentation',
                    'link' => 'http://doc.swoft.org',
                ],
                [
                    'name' => 'Case',
                    'link' => 'http://swoft.org/case',
                ],
                [
                    'name' => 'Issue',
                    'link' => 'https://github.com/swoft-cloud/swoft/issues',
                ],
                [
                    'name' => 'GitHub',
                    'link' => 'https://github.com/swoft-cloud/swoft',
                ],
            ]
        ];
        $template = 'index/index';
        return view($template, $data);
    }

    /**
     * @RequestMapping()
     * @return string
     */
    public function raw()
    {
        $name = 'Swoft';
        return $name;
    }

    public function testLog()
    {
        App::trace('this is app trace');
        Log::trace('this is log trace');
        App::error('this is log error');
        Log::trace('this is log error');
        return ['log'];
    }

    /**
     * @RequestMapping()
     * @throws \Swoft\Http\Server\Exception\BadRequestException
     */
    public function exception()
    {
        throw new BadRequestException('bad request exception');
    }

    /**
     * @RequestMapping()
     * @param Response $response
     * @return Response
     */
    public function redirect(Response $response): Response
    {
        return $response->redirect('/');
    }
}
