<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Category;

class OrdersController extends Controller
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
        $url = "http://10.29.62.100:8080/api/";
        $responseOrders = $client->request('GET', $url."orders", [
            'verify' => false,
        ]);
        $responseProduct = $client->request('GET', $url."product", [
            'verify' => false,
        ]);
        $responseUsers = $client->request('GET', $url."users", [
            'verify' => false,
        ]);
        $responseBodyOrders = json_decode($responseOrders->getBody());
        $responseBodyProduct = json_decode($responseProduct->getBody());
        $responseBodyUsers = json_decode($responseUsers->getBody());
        // dd($responseBodyUsers);
        return view('orders.index', compact('responseBodyOrders', 'responseBodyProduct', 'responseBodyUsers', 'no'));
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
