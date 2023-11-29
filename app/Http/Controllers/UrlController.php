<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Http\Requests\LinksUpdateRequest;
use App\Models\Url;

class UrlController extends Controller
{
    //
    public function show()
    {
        $links = Url::paginate(10);
        return view('show', ['links' =>$links]);
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
    public function away(string $shortUrl) {

        $link = Url::where('internal_url', $shortUrl)->firstOrFail();
        if($link) {
            $link->increment('count');
            return redirect()->away($link->external_url);
        }
    }
    public function update(string $id) {

        $link = Url::where('id', $id)->first();
        return view('update', ['link' => $link]);


    }
    public function postUpdate( int $id,UrlRequest $request ) {
        $url = $request->input('url_external');
        $prefix = $request->input('url_internal');
        $name = $request->input('url_name');

        $update = Url::where('id', $id)->first()->update([
            'external_url' => $url,
            'internal_url' => $prefix,
            'name' => $name
        ]);
        if($update) {
            return back()->with('success', 'Ссылка успешно обновленна');
        }
        return back()->with('error', 'Что-то пошло не так(');
    }
        public function delete(int $id) {
            $delete = Url::where('id', $id)->first()->delete();
            if($delete) {
                return back()->with('success', 'Ссылка успешно обновленна');
            }
            return back()->with('error', 'Что-то пошло не так(');
        }

    }
