<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Url;

class UrlController extends Controller
{
    //
    public function show()
    {

    }

    public function create()
    {
        return view('create');
    }
    public function generate(UrlRequest $request)
    {
        $url = $request->input('url_external');

        $prefix = !empty($request->input('url_internal')) ? $request->input('url_internal') : str_shuffle(\Str::random(3).mt_rand(10,99).\Str::random(5));
        $name = $request->input('url_name');
        $match = ['external_url' => $prefix];
        $create = Url::firstOrCreate([
            'external_url' => $url,
            'internal_url' => $prefix,
            'name' => $name,
            'count' => 0
        ]);
        if($create->wasRecentlyCreated) {
            return back()->with('success', 'Ссылка успешно сохранена');
        }
        return back()->with('error', 'Что-то пошло не так(');
    }
}
