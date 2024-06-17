<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/js/app.js')
    <link rel="shortcut icon" href="{{ asset('images/logo-color.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
</head>

<body class="flex flex-col min-h-screen overflow-auto bg-gray-100">
    <div class="mx-auto items-center justify-center flex pt-14">
        @include('components.content')
    </div>
    <script src="./node_modules/lodash/lodash.min.js"></script>
</body>

</html>
