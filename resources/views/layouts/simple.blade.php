<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="page.layout" content="{{ $page->layout }}" />

    @if($page->canonicalUrl)
        <x-page.canonical url="{{ $page->canonicalUrl }}" />
    @endif

    <title>@yield('title')</title>

    @vite(['resources/js/layouts/simple.js'])
</head>
<body>
<main>
    @yield('content')
</main>
</body>
</html>
