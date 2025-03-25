<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- Tailwind CDN -->
    <link  rel="stylesheet"href="{{asset('js/tailwind.min.css')}}"></link>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}" />
    @routes
    @vite('resources/js/app.js')
    @inertiaHead
</head>

<body class="bg-gray-100 text-gray-800">
    @inertia
</body>

</html>
