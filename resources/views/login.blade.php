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
      <form 
        action="/login" method="post"
        class="flex flex-col w-6/12 border border-black gap-5 rounded-lg px-4 py-8"
        >
        @csrf

        <p class="text-2xl text-center">
          Login
        </p>
        
        <div>
          <p>
            Email
          </p>

          <input type="email" name="email" placeholder="Input Email"
            class="p-2 border border-black rounded-lg w-full">
        </div>

        <div>
          <p>
            Password
          </p>

          <input type="password" name="password" placeholder="Input Password"
            class="p-2 border border-black rounded-lg w-full">
        </div>

        <div>
          <button type="submit" 
            class="p-2 border border-black w-full rounded-lg hover:bg-black hover:text-white"
          >Submit</button>
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