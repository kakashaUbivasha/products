@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg p-4">
            <div class="card-body">
                <h3 class="card-title text-center">Создать новый товар</h3>

                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            id="name"
                            placeholder="Введите название"
                            value="{{ old('name') }}"
                        >
                        @error('title')
                        <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Цена</label>
                        <input
                            type="text"
                            class="form-control @error('price') is-invalid @enderror"
                            name="price"
                            id="price"
                            placeholder="Введите цену"
                            value="{{ old('price') }}"
                        >
                        @error('price')
                        <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Категория</label>
                        <select id="category_id" name="category_id" class="form-select">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание</label>
                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            name="description"
                            id="description"
                            placeholder="Введите описание"
                            rows="4"
                        >{{ old('description') }}</textarea>
                        @error('description')
                        <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Создать</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
