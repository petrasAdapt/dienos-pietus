<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    const FB_TOKEN = 'EAACAnBtre2YBAOAnjHoTlnLi8AMVfdMXQLmqhYXWC9TuNrJTOgq0VHd8K5ZAjsXVFCa1J6qAtquLNchJGRnWnyuGWfBZCV7S7gDa2r7mc4jJkQ0ZCdW0at999xgVLZBs3FXsr7JfeB2edrAYjGcvhfiNoKeSfjgZD';

    const URL = 'https://graph.facebook.com/v2.11/';

    private $pages = [
        'amber' =>
            [
                'title' => 'Amber grill',
                'url' => 'ambergrill.lt',
            ],
        'pepper' =>
            [
                'title' => 'Pepper pizza',
                'url' => 'pepperpizza.grill',
            ],
        'zaliuke' =>
            [
                'title' => 'Zaliuke',
                'url' => 'zaliuke',
            ],
        'liuks' =>
            [
                'title' => 'Liuks kebabai',
                'url' => 'liukskebabai',
            ],

    ];

    public function index()
    {
        $client = new Client();
        $returnData = [];
        foreach ($this->pages as $key => $page) {
            $returnData[$key]['title'] = $page['title'];
            $url = $this::URL.$page['url'].'/feed?access_token='.$this::FB_TOKEN;
            $res = $client->request('GET', $url);
            $data = json_decode($res->getBody(), true);

            $photoUrl = $this::URL.'/'.$data['data'][0]['id'].'?fields=attachments&fields=attachments&access_token='.$this::FB_TOKEN;
            $photoRes = $client->request('GET', $photoUrl);
            $photoData = json_decode($photoRes->getBody(), true);
//            $returnData[$key]['time'] = $data['data'][0]['created_time'];

            $date = new \DateTime( $data['data'][0]['created_time']);
            $returnData[$key]['time'] = $date->format('Y-m-d');

            if (array_key_exists('attachments', $photoData)) {
                if (array_key_exists('description', $photoData['attachments']['data']['0'])) {
                    $returnData[$key]['text'] = $photoData['attachments']['data']['0']['description'];
                }
                $returnData[$key]['image'] = $photoData['attachments']['data']['0']['media']['image']['src'];

            } else {
                $returnData[$key]['text'] = $data['data']['0']['message'];
            }
        }

        return view('view', ['dinners' => $returnData]);
    }
}
