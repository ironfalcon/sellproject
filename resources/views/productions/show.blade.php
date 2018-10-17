@extends('layouts.main')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
      <a href="#" data-toggle="modal" data-target="#changeName">
        edit
      </a>

    <p>{{ $product->description }}</p>
  @foreach($product->photos as $photo)
  <img src="{{ asset('files/products_img/'. $photo->name) }}" alt="Card image cap" style="width:200px;">
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
                           <input required type="text" class="form-control" name="name" id="name" value="{{ old('name')}}">
                          <br>
                             <button type="submit" class="btn btn-success">Изменить</button>
                         </div>
                         {!! Form::close() !!}
                     </div>

                 </div>
             </div>
         </div>

</div>
@endsection
