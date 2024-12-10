<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up | Dribble</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="container mx-auto">
        <div class="flex justify-center pt-10">
            <form action="/register" method="post" class="flex flex-col w-6/12 gap-5 rounded-lg px-4 py-8">
                @csrf

                @php
                    $fields = [
                        ['title' => 'Fullname', 'name' => 'name', 'placeholder' => 'Input Fullname'],
                        ['title' => 'Email', 'name' => 'email', 'placeholder' => 'Input Email'],
                        ['title' => 'Password', 'name' => 'password', 'placeholder' => 'Input Password'],
                    ];
                @endphp

                <p class="text-4xl text-center text-semibold">
                    Sign up to Dribble
                </p>

                @foreach ($fields as $field)
                    <x-input :title="$field['title']" :name="$field['name']" :placeholder="$field['placeholder']" />
                @endforeach

                <div class="pt-5">
                    <button type="submit"
                        class="p-4 w-full rounded-full bg-sky-900 text-white hover:bg-sky-950">Submit</button>
                </div>

                @if ($errors->any())
                    <ul class="px-5 flex flex-col list-disc">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

            </form>

        </div>
    </main>

</body>

</html>
