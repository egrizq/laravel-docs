<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In | Dribble</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="container mx-auto">
        <div class="flex justify-center pt-10">
            <form action="/login" method="post" class="flex flex-col w-6/12  gap-5 rounded-lg px-4 py-8">
                @csrf

                <p class="text-4xl text-center font-semibold">
                    Sign in to Dribble
                </p>

                <div class="flex flex-col gap-3">
                    <p>
                        Email
                    </p>

                    <input type="email" name="email" placeholder="Input Email"
                        class="p-3 border border-black rounded-lg w-full">
                </div>

                <div class="flex flex-col gap-3">
                    <div class="flex justify-between">
                        <p>
                            Password
                        </p>

                        <a href="/" class="underline">Forgot?</a>
                    </div>

                    <input type="password" name="password" placeholder="Input Password"
                        class="p-3 border border-black rounded-lg w-full">
                </div>

                <div class="pt-5">
                    <button type="submit"
                        class="p-4 bg-sky-900 text-white border w-full rounded-full hover:bg-sky-950 hover:text-white">Submit</button>
                </div>

                <div class="flex justify-center">
                    <span>Don't have an account? <a href="/register" class="underline text-blue-600">Register here</a>
                    </span>
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
