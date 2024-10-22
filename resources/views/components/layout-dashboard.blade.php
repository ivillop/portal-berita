<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard</title>
</head>
<body>
    {{ $slot }}
    <script src="{{ asset('js/generate-slug.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('js/search-table.js') }}"></script>
    <script src="{{ asset('js/comment.js') }}"></script>
</body>
</html>
