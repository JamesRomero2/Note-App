<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- @vite('resources/css/app.css') --}}
  <title>Edit Note</title>
</head>
<body class="w-screen h-screen flex flex-col items-center justify-center gap-10 bg-gradient-to-r from-[#96f0ff] to-[#f065ff] p-10">
  <h1 class="text-5xl font-bold text-center">
    Edit Note
  </h1>
  <form action="/update-note/{{$note->id}}" method="POST" class="flex flex-col gap-2">
    @csrf
    @method('PUT')
    <div class="flex items-center justify-around py-2">
      <input id="red-radio" type="radio" value="#fde047" name="noteColor" class="w-5 h-5 bg-yellow-300  focus:ring-black ring-white ring-4 focus:ring-4 appearance-none rounded-full checked:ring-black">
      <input id="red-radio" type="radio" value="#4ade80" name="noteColor" class="w-5 h-5 bg-green-400  focus:ring-black ring-white ring-4 focus:ring-4 appearance-none rounded-full checked:ring-black">
      <input id="red-radio" type="radio" value="#f9a8d4" name="noteColor" class="w-5 h-5 bg-pink-300  focus:ring-black ring-white ring-4 focus:ring-4 appearance-none rounded-full checked:ring-black">
      <input id="red-radio" type="radio" value="#d8b4fe" name="noteColor" class="w-5 h-5 bg-purple-300  focus:ring-black ring-white ring-4 focus:ring-4 appearance-none rounded-full checked:ring-black">
      <input id="red-radio" type="radio" value="#7dd3fc" name="noteColor" class="w-5 h-5 bg-sky-300  focus:ring-black ring-white ring-4 focus:ring-4 appearance-none rounded-full checked:ring-black">
    </div>
    <input type="text" name="noteTitle" id="note-title" class="rounded p-2 text-sm" placeholder="Note Title" value="{{$note->title}}">
    <textarea name="noteContent" id="note-content" cols="20" rows="11" class="rounded p-2 text-sm resize-none" placeholder="Note Content">{{$note->content}}</textarea>
    <button class="bg-green-500 rounded font-bold py-1">Update Note</button>
  </form>
</body>
</html>