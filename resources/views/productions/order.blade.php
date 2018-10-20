@extends('layouts.main')

@section('content')
<div class="container">
  <h1>Ваш заказ</h1>
  <div class="row p-3" style="box-shadow: 6px 6px 27px -2px rgba(0,0,0,0.17);">
      <div class="col-md-4 col-xs-4">
        <img src="{{ asset('files/products_img/'. $product->photos()->first()->name) }}"
        alt="{{ $product->photos()->first()->alt }}" style="width:200px;">
      </div>

      <div class="col-md-6 col-xs-6">
        Наименование: {{ $product->name }}<br>
        Описание: {{ $product->description }} <br>
        В наличии на складе: {{ $product->count }} <br>
        Цена: {{$product->price}}
        <p class="mt-1">
          <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Форма заказа
          </a>
        </p>
      </div>
  </div>

  <!-- заказ товара -->
  <div class="row">
    <div class="col-md-12">

      <div class="collapse" id="collapseExample">
        <div class="card card-body col-md-12">

          <h1>Форма заказа</h1>
          <!-- форма для заказа -->
          <form enctype="multipart/form-data" action="{{ route('productions.store') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationCustom01">Имя</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Имя" value="{{ old('name')}}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationCustom02">Фамилия</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Фамилия" value="{{ old('surname')}}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="count">Количество (едениц) продукта:</label>
              <input type="number" name="count" id="count" class="form-control" value="{{old('count')}}">
              <br>
              <label for="type">Тип:</label>
              <input required type="text" class="form-control" name="type" id="type" value="{{ old('type')}}">
              <br>
              <label for="keywords">Ключевые слова:</label>
              <input required type="text" class="form-control" name="meta_keywords" id="keywords" value="{{ old('meta_keywords')}}">
              <br>
              <label for="meta-description">Ключевые фразы:</label>
              <input required type="text" class="form-control" name="meta_description" id="meta-description" value="{{ old('meta_description')}}">
              <br>
              <label for="img">Изображение:</label>
              <br>
              <div class="custom-file">
                <label class="custom-file-label" for="customFile">Выберите фото</label>
                <input type="file" class="custom-file-input" id="customFile" name="image" value="{{ old('image')}}">
              </div>
              <div class="form-group">
                <label for="alt">CEO метка изображения:</label>
                <input required type="text" class="form-control" name="alt" id="alt">
              </div>
              <button class="btn btn-success float-right mt-2 mb-2">Добавить</button>
            </div>
          </form>

        </div>
      </div>

    </div>
  </div>


@endsection
