<?php
namespace App\Controller;
require './vendor/autoload.php';

class BaseController
{
    public function methodGET($url,$params)
    {
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
        if($params)
        {
            $url = $url.'?'.http_build_query($params);
        }
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    public function methodPOST($url,$params)
    {
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
        if($params)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
        }

        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;

    }
    public function methodPUT($url,$params)
    {
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'PUT' );
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($params));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    public function methodDELETE($url,$params)
    {

    }
}