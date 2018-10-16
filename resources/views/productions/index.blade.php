@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Продукция</h1>
  <a href="{{ route('productions.create') }}" class="btn btn-success">Добавить товар</a>
  @foreach($products as $product)
  <div class="card mb-5" style="width: 18rem;">
    <img class="card-img-top" src="{{asset('files/products_img/'.$product->photos()->first()->name) }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{$product->name}}<br></h5>
      <p class="card-text">Цена: {{$product->price}}</p>
      <a href="{{ route('productions.show', $product->id) }}" class="btn btn-primary">подробнее</a>
    </div>
  </div>
  @endforeach

  <!-- foto: {{$product->photos()->first()->name}} -->

</div>
@endsection
