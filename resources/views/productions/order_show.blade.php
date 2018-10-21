@extends('layouts.main')

@section('content')
<div class="container-fluid">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Телефон</th>
      <th scope="col">Почта</th>
      <th scope="col">Продукт</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    <tr>
      <th scope="row">{{ $order->id }}</th>
      <td>{{ $order->client_name }}</td>
      <td>{{ $order->client_surname }}</td>
      <td>{{ $order->phone }}</td>
      <td>{{ $order->contact_mail }}</td>
      <td>{{ $order->product($order->product_id)->name }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
@endsection
