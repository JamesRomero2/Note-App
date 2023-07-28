<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- @vite('resources/css/app.css') --}}
  <title>Edit User</title>
</head>
<body class="w-screen h-screen flex flex-col items-center justify-center gap-10 bg-gradient-to-r from-[#96f0ff] to-[#f065ff] p-10">
  <h1 class="text-5xl font-bold text-center">
    Welcome to your Profile !
  </h1>
  <form action="/update-user/{{auth()->user()->id}}" method="POST" class="flex flex-col items-center gap-3">
    @csrf
    @method('PUT')
    <label for="name" class="text-2xl">Name</label>
    <input type="text" placeholder="Name" class="px-5 py-3 rounded-lg w-96" name="name" value="{{Auth::user()->name}}" required>
    <button class="bg-indigo-900 rounded-full px-10 py-3 border border-black text-white text-xl font-bold w-full">Update Account</button>
    <a href="/dashboard" class="rounded-full px-10 py-3 text-black text-xl font-bold w-full text-center cursor-pointer">Go Back To Dashboard</a>
  </form>
  <div class="">
    <form action="/delete-user/{{auth()->user()->id}}" method="POST">
      @csrf
      @method('DELETE')
      <button class="bg-red-900 rounded-full px-10 py-3 border border-black text-white text-xs font-bold w-full">Delete Account</button>
    </form>
  </div>
</body>
</html>