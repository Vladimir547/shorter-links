<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Url;
use App\Service\createService;

class UrlController extends Controller
{


    public function show()
    {
        $links = Url::paginate(10);
        return view('show', ['links' => $links]);
    }


    public function create()
    {
        return view('create');
    }

    /**
     * Функция для создания новых ссылок
     * createService сервис который записывает ссылки
     *
     * @use App\Http\Requests\UrlRequest
     * @use App\Service\createService;
     *
     * @return Illuminate\Support\Facades\Redirect
     */
    public function generate(UrlRequest $request, createService $create)
    {

        $create = $create->createLink($request);
        return back()->with($create['status'], $create['message']);
    }

    /**
     * Функция для редиректа на полную ссылку
     *
     * @return Illuminate\Support\Facades\Redirect
     */
    public function away(string $shortUrl)
    {

        $link = Url::where('internal_url', $shortUrl)->firstOrFail();
        if ($link) {
            $link->increment('count');
            return redirect()->away($link->external_url);
        }
    }

    /**
     * Функция для вывода вьюшки update
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(string $id)
    {

        $link = Url::where('id', $id)->first();
        return view('update', ['link' => $link]);


    }

    /**
     * Функция для редактирования  ссылок
     *
     * @use App\Http\Requests\UrlRequest
     * @use App\Service\createService;
     *
     * @return Illuminate\Support\Facades\Redirect
     */
    public function postUpdate(int $id, UrlRequest $request)
    {
        $url = $request->input('url_external');
        $prefix = $request->input('url_internal');
        $name = $request->input('url_name');

        $update = Url::where('id', $id)->first()->update([
            'external_url' => $url,
            'internal_url' => $prefix,
            'name' => $name
        ]);
        if ($update) {
            return back()->with('success', 'Ссылка успешно обновленна');
        }
        return back()->with('error', 'Что-то пошло не так(');
    }
    /**
     * Функция для удаления ссылок
     *
     *
     * @return Illuminate\Support\Facades\Redirect
     */
    public function delete(int $id)
    {
        $delete = Url::where('id', $id)->first()->delete();
        if ($delete) {
            return back()->with('success', 'Ссылка успешно обновленна');
        }
        return back()->with('error', 'Что-то пошло не так(');
    }

}
