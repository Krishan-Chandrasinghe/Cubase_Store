<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Welcome</title>
</head>
<body>
    <div class="flex flex-col items-center justify-center h-screen bg-[#9eff95]">
        <h1 class="text-6xl font-bold">Welcome to Cubase Store 😊</h1>
        <div class="flex gap-3 mt-4">
            <a href="{{ url('users') }}" class="button">Users</a>
            <a href="{{ url('products') }}" class="button">Products</a>
        </div>
    </div>
</body>
</html>
