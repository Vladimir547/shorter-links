<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    //
    public function show()
    {

    }

    public function create(UrlRequest $request)
    {
        return view('create');
    }
}
