<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container mx-auto">
        <div class="flex flex-col">
            <span>This is menu for {{ $email }}.</span>
            <a href="/" class="text-blue-500 underline"> Go back</a>

            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="text-red-500 underline">logout</button>
            </form>
        </div>
    </div>
</body>

</html>
