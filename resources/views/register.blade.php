<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Account</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="container mx-auto">
        <div class="flex justify-center pt-10">
            <form action="/register" method="post"
                class="flex flex-col w-6/12 border border-black gap-5 rounded-lg px-4 py-8">
                @csrf

                @php
                    $fields = [
                        ['title' => 'Fullname', 'name' => 'name', 'placeholder' => 'Input Fullname'],
                        ['title' => 'Email', 'name' => 'email', 'placeholder' => 'Input Email'],
                        ['title' => 'Password', 'name' => 'password', 'placeholder' => 'Input Password'],
                    ];
                @endphp

                <p class="text-2xl text-center">
                    Create Account
                </p>

                @foreach ($fields as $field)
                    <x-input :title="$field['title']" :name="$field['name']" :placeholder="$field['placeholder']" />
                @endforeach

                <div>
                    <button type="submit"
                        class="p-2 border border-black w-full rounded-lg hover:bg-black hover:text-white">Submit</button>
                </div>

                @if ($errors->any())
                    <div class="">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </form>

        </div>
    </main>

</body>

</html>
