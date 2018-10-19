@extends('layouts.main')

@section('content')
<div class="container">
    <h1>
      {{ $product->name }}
      <a href="#" data-toggle="modal" data-target="#changeName">
        edit
      </a>
    </h1>

    <p>
      {{ $product->description }}
      <a href="#" data-toggle="modal" data-target="#changeDescription">
        edit
      </a>
    </p>

    Изображения
    <a href="#" data-toggle="modal" data-target="#addFoto">
      добавить
    </a>
    <br>

  @foreach($product->photos as $photo)
  <!-- вывод изображений -->
  <img src="{{ asset('files/products_img/'. $photo->name) }}" alt="Card image cap" style="width:200px;">

  <!-- форма удаления изображения -->
      {!! Form::open(['method' => 'DELETE', 'route' => ['productions.delete', $photo->id] ])!!}
      {{ csrf_field() }}
      <button alt="Удалить" style="margin-top:5px;" class="btn btn-danger" onclick="return confirm('Вы уверены?')">
      удалить
      </button>
      {!! Form::close() !!}
  @endforeach
      <p class="card-text">Цена: {{$product->price}}</p>
    </div>
  </div>


  <!-- foto: {{$product->photos()->first()->name}} -->

  {{--Изменение имени--}}
  <div class="modal fade" id="changeName" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Изменение названия</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          {!! Form::open(['route' => ['productions.update', $product->id], 'method' => 'POST']) !!}
          <div class="form-group">
            <label for="name">Название:</label>
            <input required type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
            <br>
            <button type="submit" class="btn btn-success">Изменить</button>
          </div>
          {!! Form::close() !!}
        </div>

      </div>
    </div>
  </div>

  {{--Изменение описания--}}
  <div class="modal fade" id="changeDescription" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Изменение описания</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          {!! Form::open(['route' => ['productions.update', $product->id], 'method' => 'POST']) !!}
          <div class="form-group">
            <label for="description">Название:</label>
            <input required type="text" class="form-control" name="description" id="description" value="{{ $product->description }}">
            <br>
            <button type="submit" class="btn btn-success">Изменить</button>
          </div>
          {!! Form::close() !!}
        </div>

      </div>
    </div>
  </div>


  {{--Добавление изображения--}}
  <div class="modal fade" id="addFoto" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Изменение названия</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" action="{{ route('productions.update', $product->id) }}" method="POST">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="img">Изображение:</label>
            <input type="file" class="btn btn-success" id="img" name="image">
            <br>
            <br>
            <button type="submit" class="btn btn-success">Добавить</button>
          </div>
          </form>
        </div>

      </div>
    </div>
  </div>

</div>
@endsection
