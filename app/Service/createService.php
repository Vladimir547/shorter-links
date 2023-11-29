<?php

namespace App\Service;
use App\Http\Requests\UrlRequest;
use App\Models\Url;


class createService
{
    /**
     * Валидация запросов.
     *
     * @use App\Http\Requests\UrlRequest;
     * @use App\Models\Url;

     *
     * @return array
     */
    public function createLink(UrlRequest $request) {
        //ложим данные из запроса в переменные
        $url = $request->input('url_external');
        //если url_internal пустой то генерируем, а если нет, то используем
        $prefix = !empty($request->input('url_internal')) ? $request->input('url_internal') : str_shuffle(\Str::random(3).mt_rand(10,99).\Str::random(5));
        $name = $request->input('url_name');
        //создаем запись в бд
        $create = Url::firstOrCreate([
            'external_url' => $url,
            'internal_url' => $prefix,
            'name' => $name,
            'count' => 0
        ]);
        // если успешно выполненна запись в бд, то возвращается массив со статусом success
        if($create->wasRecentlyCreated) {
            //
            return ['status' => 'success', 'message' => 'Ссылка успешно сохранена'];
        }
        // если не выполненна запись в бд, то возвращается массив со статусом error
        return ['status' => 'error', 'message' => 'Что-то пошло не так('];
    }
}
