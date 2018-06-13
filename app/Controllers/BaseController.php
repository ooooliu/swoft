<?php
/**
 * Created by PhpStorm.
 * User: Lyn
 * Date: 2018/6/6
 * Time: 上午11:19
 */

namespace App\Controllers;


class BaseController
{
    public function __construct()
    {
        //response()->withAddedHeader('cookie', '11111');
        //$this->setHeader();
    }

    protected function setHeader()
    {
        $header['Access-Control-Allow-Origin'] = '*';
        $header['Access-Control-Allow-Methods'] = 'GET, PUT, POST, DELETE, HEAD, OPTIONS';
        $header['Access-Control-Allow-Headers'] = 'X-Requested-With, Origin, X-Csrftoken, Content-Type, Accept';

        if ($header) {
            foreach ($header as $head => $value) {
                header("{$head}: {$value}");
            }
        }
    }
}