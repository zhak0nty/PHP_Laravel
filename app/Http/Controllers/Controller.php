<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

фвabstract class Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;
}
