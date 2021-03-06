@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Добавление продукта</h1>
    <form enctype="multipart/form-data" action="{{ route('productions.store') }}" method="POST">
      {{ csrf_field() }}
      <div class="form-group">
        <br>
        <label for="name">Название:</label>
        <input required type="text" class="form-control" name="name" id="name" value="{{ old('name')}}">
        <br>
        <label for="description">Описание:</label>
        <textarea required name="description" id="description"  rows="5" class="summernote form-control input-text">{{old('description')}}</textarea>
        <br>
        <label for="price">Цена:</label>
        <input type="number" name="price" id="price" class="form-control" value="{{old('price')}}">
        <br>
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
@endsection
