<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Document')</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-nav.navbar/>
    @yield('content')
    <x-footer.footer/>
</body>
</html>