<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductController extends Controller
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
        $urlProduct = "http://10.29.62.100:8080/api/product";
        $urlCategory = "http://10.29.62.100:8080/api/category";
        $responseProduct = $client->request('GET', $urlProduct, [
            'verify' => false,
        ]);
        $responseCategory = $client->request('GET', $urlCategory, [
            'verify' => false,
        ]);
        $responseBodyProduct = json_decode($responseProduct->getBody());
        
        $responseBodyCategory = json_decode($responseCategory->getBody());
        return view('product.index', compact('responseBodyProduct', 'responseBodyCategory', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();
        $url = "http://10.29.62.100:8080/api/category";
        $response = $client->request('GET', $url, [
            'verify' => false,
        ]);
        $responseBody = json_decode($response->getBody());
        return view('product.create', compact('responseBody'));
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
        $url = "http://10.29.62.100:8080/api/product";
        $response = $client->request('POST', $url, [
            'form_params' => [
                'category_id' => $request->category_id,
                'product_name' => $request->product_name,
                'price' => $request->price,
                'desc' => $request->desc,
                'photo_url' => $request->photo_url,
            ]
        ]);
        if($response->getStatusCode()) {
            return redirect('/product')->with('success', 'Product created successfully');
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
    public function edit($product_id, $category_id)
    {
        $client = new Client();
        $urlProduct = "http://10.29.62.100:8080/api/product/".$product_id;
        $urlCategory = "http://10.29.62.100:8080/api/category/";
        $responseProduct = $client->request('GET', $urlProduct, [
            'verify' => false,
        ]);
        $responseCategory = $client->request('GET', $urlCategory, [
            'verify' => false,
        ]);
        $responseBodyProduct = json_decode($responseProduct->getBody());
        $responseBodyCategory = json_decode($responseCategory->getBody());
        // dd($responseBodyProduct);
        return view('product.edit', compact('responseBodyProduct', 'responseBodyCategory', 'product_id', 'category_id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $client = new Client();
        $url = "http://10.29.62.100:8080/api/product/".$product_id;
        $response = $client->request('PUT', $url, [
            'form_params' => [
                'category_id' => $request->category_id,
                'product_name' => $request->product_name,
                'price' => $request->price,
                'desc' => $request->desc,
                'photo_url' => $request->photo_url,
            ]
        ]);
        if($response->getStatusCode()) {
            return redirect('/product')->with('success', 'Product updated successfully');
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
    public function destroy($product_id)
    {
        $client = new Client();
        $url = "http://10.29.62.100:8080/api/product/".$product_id;
        $response = $client->request('DELETE', $url, [
            'form_params' => [
                'product_id' => $product_id,
            ]
        ]);
        if($response->getStatusCode()) {
            return redirect('/product')->with('success', 'Product deleted successfully');
        } else {
            echo "Failed";
        }
    }
}
