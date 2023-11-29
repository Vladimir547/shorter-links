<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UrlRequest;
use App\Models\Url;
use App\Service\createService;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $links = Url::all();
        return response()->json([
            'status' => '200',
            'message' => $links
        ]);
    }

    /**
     * API для создания новых ссылок
     ** @use App\Http\Requests\UrlRequest
     * @use App\Service\createService;
     *
     * @return JsonResponse
     */
    public function store(UrlRequest $request,createService $create)
    {
        $create = $create->createLink($request);
        return response()->json([
            'status' => $create['status'],
            'message' => $create['message']
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
