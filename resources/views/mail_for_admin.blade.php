<div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1);background-color: #f9fcff; padding: 20px 20px">
    <div class="panel-heading">Заказ от пользователя {{ $order->client_name }}</div>
    <div class="panel-body">
        Имя заказчика: {{ $order->client_name }}<br>
        Фамилия заказчика: {{ $order->client_surname }}<br>
        Email: {{ $order->mail }}<br>
        Телефон: {{ $order->phone }}<br>
        Товар: {{ product->name }}<br>
        Количество (едениц): {{ $order->count }}<br>
        Примечание: {{ $order->description }}<br>

    </div>
</div>
