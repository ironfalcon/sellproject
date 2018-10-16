@extends('layouts.main')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
  @foreach($product->photos as $photo)
  <img src="{{ asset('files/products_img/'. $photo->name) }}" alt="Card image cap" style="width:200px;">
  @endforeach
      <p class="card-text">Цена: {{$product->price}}</p>
    </div>
  </div>


  <!-- foto: {{$product->photos()->first()->name}} -->

</div>
@endsection
