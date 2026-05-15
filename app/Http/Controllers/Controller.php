<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        if (function_exists('start_measure')) {
            start_measure('controller', 'Controller');
        }
    }

    public function __destruct()
    {
        if (function_exists('stop_measure')) {
            stop_measure('controller');
        }
    }
}
