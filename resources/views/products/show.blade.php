@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg p-4">
            <div class="card-body text-center">
                <h3 class="card-title">{{ $product->name }}</h3>

                <h4 class="mt-3">Описание</h4>
                <p>{{$product->description}}</p>
                <h5>Цена</h5>
                <p class="text-center">{{$product->price}}</p>
                <h5>Категория</h5>
                <p>{{$product->category->name}}</p>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Изменить</a>

                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>

                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад</a>
                </div>
            </div>
        </div>
    </div>
@endsection
