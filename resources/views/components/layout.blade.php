<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Portal Berita</title>
</head>

<body class="px-10 lg:px-20">
    <x-header></x-header>
    <div class="py-0.5"></div>
    <main class="py-4 flex gap-4 flex-col">
        {{ $slot }}
    </main>
    <x-footer></x-footer>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>