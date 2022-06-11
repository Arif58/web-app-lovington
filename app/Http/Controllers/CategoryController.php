<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 0;
        $client = new Client();
        $url = "http://10.29.62.100:8080/api/category";
        $response = $client->request('GET', $url, [
            'verify' => false,
        ]);
        $responseBody = json_decode($response->getBody());
        return view('category.index', compact('responseBody', 'no'));
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $url = "http://10.29.62.100:8080/api/category";
        $response = $client->request('POST', $url, [
            'form_params' => [
                'category_name' => $request->category_name,
                'photo_url' => $request->photo_url,
            ]
        ]);
        if($response->getStatusCode()) {
            return redirect('/category')->with('success', 'Category created successfully');
        } else {
            echo "Failed";
        }
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
    public function edit($category_id)
    {
        $client = new Client();
        $url = "http://10.29.62.100:8080/api/category/".$category_id;
        $response = $client->request('GET', $url, [
            'verify' => false,
        ]);
        $responseBody = json_decode($response->getBody());
        return view('category.edit', compact('responseBody'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $client = new Client();
        $url = "http://10.29.62.100:8080/api/category/".$category_id;
        $response = $client->request('PUT', $url, [
            'form_params' => [
                'category_name' => $request->category_name,
                'photo_url' => $request->photo_url,
            ]
        ]);
        if($response->getStatusCode()) {
            return redirect('/category')->with('success', 'Category updated successfully');
        } else {
            echo "Failed";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $client = new Client();
        $url = "http://10.29.62.100:8080/api/category/".$category_id;
        $response = $client->request('DELETE', $url, [
            'form_params' => [
                'category_id' => $category_id,
            ]
        ]);
        if($response->getStatusCode()) {
            return redirect('/category')->with('success', 'Category deleted successfully');
        } else {
            echo "Failed";
        }
    }
}
