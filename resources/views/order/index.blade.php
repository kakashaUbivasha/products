@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center mb-4">
            <h2 class="text-center">Список заказов</h2>
            <a href="{{route('orders.create')}}">Добавить заказ</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Дата создания</th>
                <th>ФИО покупателя</th>
                <th>Статус</th>
                <th>Итоговая цена</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>
                        {{$order->status}}
                    </td>
                    <td>{{ number_format($order->product->price * $order->quantity, 2, ',', ' ') }} ₽</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">Подробнее</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    </div>
@endsection
