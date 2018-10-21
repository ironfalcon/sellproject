@extends('layouts.main')

@section('content')
<div class="container">
    <h1>
      {{ $product->name }}
      @auth
      <a href="#" data-toggle="modal" data-target="#changeName">
        edit
      </a>
      @endauth
    </h1>

    <p>
      {{ $product->description }}
      @auth
      <a href="#" data-toggle="modal" data-target="#changeDescription">
        Изменить
      </a>
      @endauth
    </p>

    Изображения
    @auth
    <a href="#" data-toggle="modal" data-target="#addFoto">
      добавить
    </a>
    @endauth
    <br>
<hr>
  @foreach($product->photos as $photo)
  <!-- вывод изображений -->
  <img src="{{ asset('files/products_img/'. $photo->name) }}" alt="{{ $photo->alt }}" style="width:200px;">

  <!-- форма удаления изображения -->
      @auth
      {!! Form::open(['method' => 'DELETE', 'route' => ['productions.delete_photo', $photo->id] ])!!}
      {{ csrf_field() }}
      <button alt="Удалить" style="margin-top:5px;" class="btn btn-danger" onclick="return confirm('Вы уверены?')">
      удалить
      </button>
      {!! Form::close() !!}
      @endauth
      <br>
  @endforeach
  <hr>
      <p class="card-text">
        Цена: {{$product->price}}
        @auth
        <a href="#" data-toggle="modal" data-target="#changePrice">
          Изменить
        </a>
        @endauth
      </p>
      <a href="{{ route('productions.order', $product->id) }}" class="btn btn-primary">заказать</a>

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

  {{--Изменение имени--}}
  <div class="modal fade" id="changePrice" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Изменение цены</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          {!! Form::open(['route' => ['productions.update', $product->id], 'method' => 'POST']) !!}
          <div class="form-group">
            <label for="price">Цена:</label>
            <input required type="text" class="form-control" name="price" id="price" value="{{ $product->price }}">
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
            <div class="custom-file">
              <label class="custom-file-label" for="customFile">Выберите фото</label>
              <input type="file" class="custom-file-input" id="customFile" name="image" required>
            </div>
            <div class="form-group">
              <label for="alt">CEO метка изображения:</label>
              <input required type="text" class="form-control" name="alt" id="alt">
            </div>
            <button type="submit" class="btn btn-success">Добавить</button>
          </div>
          </form>
        </div>

      </div>
    </div>
  </div>

</div>
@endsection
