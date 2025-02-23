@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Информация о заказе #{{ $order->id }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>ФИО покупателя:</strong>
                            <p>{{ $order->customer_name }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Дата создания:</strong>
                            <p>{{ $order->created_at->format('d.m.Y H:i') }}</p>
                        </div>

                        <div class="mb-3">
                            <strong>Статус заказа:</strong>
                            <p>
                                {{$order->status}}
                            </p>
                        </div>
                        <div class="mb-3">
                            <strong>Товар:</strong>
                            <p>{{ $order->product->name }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Количество:</strong>
                            <p>{{ $order->quantity }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Итоговая сумма:</strong>
                            <p>{{ number_format($order->product->price * $order->quantity, 2, ',', ' ') }} ₽</p>
                        </div>
                        <div class="mb-3">
                            <strong>Комментарий покупателя:</strong>
                            <p>{{ $order->comment ?? 'Без комментария' }}</p>
                        </div>
                        @if($order->status === 'новый')
                            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="completed">
                                <button type="submit" class="btn btn-success w-100">Отметить как выполненный</button>
                            </form>
                        @else
                            <button class="btn btn-secondary w-100" disabled>Заказ выполнен</button>
                        @endif
                        <div class="mt-3 text-center">
                            <a href="{{ route('orders.index') }}" class="btn btn-outline-primary">Вернуться к списку заказов</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
