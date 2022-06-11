@extends('layout.template')

@section('head-content')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Orders</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Orders</li>
      </ol>
     
    </div>
  </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Nama</th>
      <th>Product</th>
      <th>Alamat</th>
      <th>Jumlah</th>
      <th>Tgl. Order</th>
    </tr>
    </thead>
    <tbody>
      {{-- @dd($responseBodyUsers->users); --}}
      @foreach ($responseBodyOrders->orders as $response)
    <tr>
      @for ($i = 0; $i < count($responseBodyUsers->users); $i++)
      @if ( $response->user_id == $responseBodyUsers->users[$i]->id )
      <td> {{ $responseBodyUsers->users[$i]->name }} </td>
      @endif
      @endfor

      @for ($i = 0; $i < count($responseBodyProduct->products); $i++)
      @if ( $response->product_id == $responseBodyProduct->products[$i]->product_id )
      <td> {{ $responseBodyProduct->products[$i]->product_name }} </td>
      @endif
      @endfor
      
      <td>{{ $response->address }}</td>
      <td>{{ $response->quantity }}</td>
      <td>{{  strftime("%d %b %Y",strtotime($response->created_at)) }}</td>
      {{-- <td>{{ $response->created_at }}</td> --}}
    </tr>
    @endforeach
  </table>    
@endsection