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
          <form enctype="multipart/form-data" action="{{ route('productions.order_store') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationCustom01">Имя:</label>
                <input type="text" class="form-control" id="validationCustom01" name="client_name" placeholder="Имя" value="{{ old('client_name')}}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationCustom02">Фамилия:</label>
                <input type="text" class="form-control" id="validationCustom02" name="client_surname" placeholder="Фамилия" value="{{ old('client_surname')}}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="count">Количество (едениц) продукта:</label>
              <input required type="text" name="count" id="count" class="form-control" value="{{old('count')}}" onblur="isright(this);">
              <br>
              <label for="phone">Контактный телефон:</label>
              <input required type="text" class="form-control" name="phone" id="phone" value="{{ old('phone')}}">
              <br>
              <label for="exampleInputEmail1">Адресс электронной почты(email):</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">На указанную почту вы получите письмо с информацией о заказе.</small>
              <br>
              <label for="description">Комментарии к заказу:</label>
              <textarea required name="description" id="description"  rows="5" class="summernote form-control input-text">{{old('description')}}</textarea>
              <br>
              <input id="product_id" name="product_id" type="hidden" value="{{ $product->id }}">

              <button class="btn btn-success float-right mt-2 mb-2">Оформить заказ</button>
            </div>
          </form>

        </div>
      </div>

    </div>
  </div>

  <!-- Маска для телефона -->
  <script>
  $(function() {
    $("#phone").mask("+7(000)000-00-00", {
      placeholder: "+7(___)___-__-__",
      clearIfNotMatch: true
    });
  });
  </script>

<!-- скрипт для валидации колличество продукта не больше чем на складе -->
  <script>
  function isright(obj)
   {
   var value= +obj.value.replace(/\D/g,'')||0;
   if (value>{{ $product->count }}){
     value={{ $product->count }};
     alert( "Сейчас в наличии ммаксимум {{ $product->count }} едениц продукта" );}
   if (value<1) value=1;
   obj.value = value
   }
  </script>


@endsection
