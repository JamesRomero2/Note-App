<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/app.css">
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- @vite('resources/css/app.css') --}}
  <title>Notes App</title>
</head>
<body class="w-screen h-screen flex flex-col items-center justify-center gap-10 bg-gradient-to-r from-[#96f0ff] to-[#f065ff]">
  <h1 class="text-5xl font-bold text-center">
    Welcome to Notes App
  </h1>
  <form action="/login-user" method="POST" class="flex flex-col items-center gap-3">
    @csrf
    <input type="email" placeholder="Email" class="px-5 py-3 rounded-lg w-96" name="login_email">
    <input type="password" placeholder="Password" class="px-5 py-3 rounded-lg w-96" name="login_password">
    <button type="submit" class="bg-indigo-900 rounded-full px-10 py-3 w-56 border border-black text-white text-xl font-bold">Login</button>
    <p>New to Notes App ? <a href="/register" class="font-medium text-rose-600">Register Here !</a></p>
  </form>
</body>
</html>