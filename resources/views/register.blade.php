<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- @vite('resources/css/app.css') --}}
  <title>Register to Notes App</title>
</head>
<body class="w-screen h-screen flex flex-col items-center justify-center gap-10 bg-gradient-to-r from-[#96f0ff] to-[#f065ff]">
  <h1 class="text-5xl font-bold text-center">
    Register to Notes App
  </h1>
  <form action="/add-new-user" method="POST" class="flex flex-col items-center gap-3">
    @csrf
    <input type="text" placeholder="Name" class="px-5 py-3 rounded-lg w-96" name="name" required>
    <input type="email" placeholder="Email" class="px-5 py-3 rounded-lg w-96" name="email" required>
    <input type="password" placeholder="Password" class="px-5 py-3 rounded-lg w-96" name="password" required>
    <input type="password" placeholder="Confirm Password" class="px-5 py-3 rounded-lg w-96" name="password_confirmation" required>
    <button type="submit" class="bg-indigo-900 rounded-full px-10 py-3 border border-black text-white text-xl font-bold w-full">Create Account</button>
    <a href="/" class="rounded-full px-10 py-3 text-black text-xl font-bold w-full text-center cursor-pointer">Go Back</a>
  </form>
</body>
</html>