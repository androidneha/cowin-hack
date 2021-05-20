<?php

namespace Project\Controllers;

use GuzzleHttp\Client;

class IndexController extends ControllerAbstract
{
    public function indexAction()
    {
        $response = [];
        $pincode = '';
        if ($this->request->isPost()) {
            $date  = date('d-m-Y', strtotime('now'));
            $data = $this->request->post();
            $pincode = $data['pincode'];
            try {
                $res = (new Client())->request('GET', 'https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByPin?pincode='.$pincode.'&date='.$date.'', [
                    'referer' => true,
                    'headers' => [
                        'User-Agent' => 'cowin/v1.0',
                        'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
                        'Accept-Encoding' => 'gzip, deflate, br',
                    ],
                ]);
                $response = json_decode($res->getBody()->getContents(), true);
            } catch (\Exception $e) {

            }
        }
        $this->view->display('index.tpl', compact('response', 'pincode'));
    }

}
