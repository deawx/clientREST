<?php

namespace App\Controller;
require './vendor/autoload.php';

class BaseController
{
    public function methodGET($url, $params, $header)
    {
        $ch = curl_init();
        $head = [];
        $head = "Authorization: Bearer" . $header;
        $head[] = 'Content-length: 0';
        $head[] = 'Content-type: application/json';
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        if ($params) {
            $url = $url . '?' . http_build_query($params);
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, $head);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public function methodPOST($url, $params, $header)
    {
        $ch = curl_init();
        $head = [];
        $head = "Authorization: Bearer" . $header;
        $head[] = 'Content-length: 0';
        $head[] = 'Content-type: application/json';
        curl_setopt($ch, CURLOPT_HEADER, $head);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        if ($params) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;

    }

    public function methodPUT($url, $params, $header)
    {
        $ch = curl_init();
        $head = [];
        $head = "Authorization: Bearer" . $header;
        $head[] = 'Content-length: 0';
        $head[] = 'Content-type: application/json';
        curl_setopt($ch, CURLOPT_HEADER, $head);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public function methodDELETE($url, $params, $header)
    {
        $ch = curl_init();
        $head = [];
        $head = "Authorization: Bearer" . $header;
        $head[] = 'Content-length: 0';
        $head[] = 'Content-type: application/json';
        curl_setopt($ch, CURLOPT_HEADER, $head);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}