<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $name = "Andrey";
        $course = "Laravel";
        $university = "KBTU";

        return view('profile', [
            'name' => $name,
            'course' => $course,
            'university' => $university
        ]);
    }
}