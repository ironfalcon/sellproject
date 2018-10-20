@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row mb-2">
    <h1 style="float:left;">Продукция</h1>
</div>
@auth
<div class="row mb-2">
<a href="{{ route('productions.create') }}" class="btn btn-success mb-3" style="float:left;">Добавить товар</a>
</div>
@endauth
  @foreach($products as $product)
  <div class="card mb-5 mr-4" style="width: 18rem; float:left;">
    <img class="card-img-top" src="{{asset('files/products_img/'.$product->photos()->first()->name) }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{$product->name}}<br></h5>
      <p class="card-text">Цена: {{$product->price}}</p>
      <a href="{{ route('productions.show', $product->id) }}" class="btn btn-primary">подробнее</a>
      <a href="{{ route('productions.order', $product->id) }}" class="btn btn-primary">заказать</a>
      <!-- кнопка удаления -->
      @auth
      {!! Form::open(['method' => 'DELETE', 'route' => ['productions.delete_product', $product->id] ])!!}
      {{ csrf_field() }}
      <button alt="Удалить" style="margin-top:5px;" class="btn btn-danger" onclick="return confirm('Вы уверены?')">
      удалить
      </button>
      {!! Form::close() !!}
      @endauth
    </div>
  </div>
  @endforeach


</div>
@endsection
