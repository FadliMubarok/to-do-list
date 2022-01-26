<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    @include('includes.admin.css')
</head>
<body>
    @include('includes.admin.header')
    @include('includes.admin.sidebar')
    <main id="main" class="main">
        @yield('content')
    </main>
    @include('includes.admin.footer')
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @include('includes.admin.javascript')
</body>
</html>