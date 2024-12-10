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
        <div class="flex flex-col pt-10 gap-5">
            <span>This is menu for {{ $email }}.</span>

            <div class="flex gap-4">
                <a href="/" class="text-blue-500 underline"> Go back</a>

                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="text-red-500 underline">logout</button>
                </form>
            </div>

            <form action="/photo" method="post" enctype="multipart/form-data" class="flex flex-col gap-4">
                @csrf
                <input type="file" name="image" accept="image/*" required>

                <button type="submit" class="p-2 border border-black w-fit rounded-xl">Submit</button>
            </form>

            @if ($errors->any())
                <div class="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</body>

</html>
