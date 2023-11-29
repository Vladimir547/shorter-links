<?php

namespace App\Service;
use App\Http\Requests\UrlRequest;
use App\Models\Url;


class createService
{
    public function createLink(UrlRequest $request) {
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
            return ['status' => 'success', 'message' => 'Ссылка успешно сохранена'];
        }
        return ['status' => 'error', 'message' => 'Что-то пошло не так('];
    }
}
