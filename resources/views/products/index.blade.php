@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="d-flex flex-column justify-content-center align-items-center mb-4">
            <h2 class="text-center">Список товаров</h2>
{{--            <a href="{{route('books.create')}}">Добавить товар</a>--}}
        </div>
    </div>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center">{{$product->name}}</h5>
                        <span>{{$product->price}}</span>
                        <ul class="d-flex">{{$product->category}}</ul>
{{--                        <a class="btn btn-outline-primary mt-auto" href="{{route('books.show', $product->id)}}">Подробнее</a>--}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
@endsection
