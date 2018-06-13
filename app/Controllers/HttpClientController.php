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

use Swoft\HttpClient\Client;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;

/**
 * @Controller(prefix="/httpClient")
 */
class HttpClientController
{
    /**
     * @RequestMapping("/httpClient")
     * @return array
     * @throws \Swoft\HttpClient\Exception\RuntimeException
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function request(): array
    {
        /*$client = new Client();
        $result = $client->get('http://www.swoft.org')->getResult();
        $result2 = $client->get('http://www.swoft.org')->getResponse()->getBody()->getContents();
        return compact('result', 'result2');*/

        $mongo_uri = "mongodb://localhost:27017";

        $mongo = new \MongoDB\Client($mongo_uri);

        $filer = [
            "state" => 1,
            "search" => [
                '$exists' => 0
            ]
        ];

        $options = [
            "limit" => 60
        ];
        $mongo = $mongo->selectCollection("test", "Card");
        $res = $mongo->find($filer, $options)->toArray();

        $client = new Client(['adapter' => 'co']);
        $search_uri = 'http://api.extend.51dunjin.com/open.api/search.html?data=';
        //$search_uri = 'http://xzzapi.51haiheng.com/check.txt?v=';
        $response = $_id = [];

        foreach ($res as $val){
            $response[] = $client->get($search_uri.$val['identify']);
            $_id[] = $val['_id'];
        }

        foreach ($response as $re){
            var_dump($re->getResult());
        }

        $update = [
            '$set' => [
                'state' => 0,
                'search' => 1
            ]
        ];

        $options = [
            'upsert' => true,
            //'multi' => false
        ];

        $r = $mongo->updateMany(['_id'=>['$in'=>$_id]], $update, $options);
        var_dump($r);

        return $res;
    }


}