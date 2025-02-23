<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
</head>
<body>
<div class="container mt-3">
    <ul class="d-flex justify-content-center gap-5">
        <li><a href="{{route('products.index')}}">Товары</a></li>
        <li><a href="{{route('orders.index')}}">Заказы</a></li>
    </ul>
    @yield('content')
</div>
</body>
</html>
