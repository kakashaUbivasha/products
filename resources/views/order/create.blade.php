@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Создание заказа</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="customer_name" class="form-label">ФИО покупателя:</label>
                                <input type="text" name="customer_name" id="customer_name"
                                       class="form-control @error('customer_name') is-invalid @enderror"
                                       placeholder="Введите ФИО" value="{{ old('customer_name') }}" required>
                                @error('customer_name')
                                <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="product_id" class="form-label">Выберите товар:</label>
                                <select name="product_id" id="product_id"
                                        class="form-select @error('product_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Выберите товар...</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }} - {{ number_format($product->price, 2, ',', ' ') }} ₽
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Количество:</label>
                                <input type="number" name="quantity" id="quantity"
                                       class="form-control @error('quantity') is-invalid @enderror"
                                       min="1" value="{{ old('quantity', 1) }}" required>
                                @error('quantity')
                                <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="comment" class="form-label">Комментарий:</label>
                                <textarea name="comment" id="comment"
                                          class="form-control @error('comment') is-invalid @enderror"
                                          rows="3">{{ old('comment') }}</textarea>
                                @error('comment')
                                <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success w-100">Создать заказ</button>
                            <a href="{{ route('orders.index') }}" class="btn btn-secondary w-100 mt-3">Назад</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
