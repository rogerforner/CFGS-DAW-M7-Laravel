<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductJsonFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Product::all();

        $data = [
          'version' => 'https://jsonfeed.org/version/1',
          'title' => 'M7 DAW, Institut Montsià: Botiga',
          'home_page_url' => 'http://127.0.0.1:8000/',
          'feed_url' => 'http://127.0.0.1:8000/feed',
          'icon' => 'http://127.0.0.1:8000/apple-touch-icon.png',
          'favicon' => 'http://127.0.0.1:8000/apple-touch-icon.png',
          'items' => [],
        ];

        foreach ($posts as $key => $post) {
            $data['items'][$key] = [
            'id' => $post->id,
            'title' => $post->name,
            'url' => 'http://127.0.0.1:8000/'.$post->uri,
            'image' => $post->description,
            'content_html' => $post->price,
            'date_created' => $post->created_at->tz('UTC')->toRfc3339String(),
            'date_modified' => $post->updated_at->tz('UTC')->toRfc3339String()
          ];
        }

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
