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
     * Display a listing of the resource.
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
     * Store a newly created resource in storage.
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
