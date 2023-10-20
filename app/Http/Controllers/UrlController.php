<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $urls = Url::all();

        if ($request->wantsJson()) {
            return response()->json($urls);
        }

        return view('urls.index', compact('urls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('urls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UrlRequest $request)
    {
        $slug = generateRandomString();
        $url = Url::create(
            [
                'destination' => $request->get('destination'),
                'slug' => $slug
            ]
        );

        if ($request->wantsJson()) {
            return response()->json($url);
        }

        return redirect()->route('urls.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url)
    {
        $url->views += 1;
        $url->save();

        return redirect($url->shortened_url);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        //
    }
}
