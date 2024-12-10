<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container mx-auto pt-10">
        <div class="flex flex-col justify-center">

            @isset($notif)
                <p>you've to login first</p>
            @endisset

            <x-name title="hello world" name="rizq" />

            <div class="flex flex-row gap-4 pt-5">
                @php
                    $links = [
                        ['url' => '/register', 'name' => 'register'],
                        ['url' => '/login', 'name' => 'login'],
                        ['url' => '/home/rizq', 'name' => 'menu'],
                    ];
                @endphp

                @foreach ($links as $link)
                    <x-link :url="$link['url']" :name="$link['name']" />
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
