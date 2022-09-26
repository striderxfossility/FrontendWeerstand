<?php

namespace App\Services;
use GuzzleHttp\Client;

class ApiService {
    public static function get($url)
    {
        try {
            $response = file_get_contents('https://backend.weerstandnatuursteen.nl/api/' . $url);
            return json_decode($response);
        } catch (\Exception $e) {
            return null;
        }
    }

    public static function api()
    {
        return 'https://backend.weerstandnatuursteen.nl/';
    }
}