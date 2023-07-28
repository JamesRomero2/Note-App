<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <script type="text/tailwindcss">
    @layer utilities {
      /* Chrome, Safari and Opera */
      .no-scrollbar::-webkit-scrollbar {
          display: none;
      }
  
      .no-scrollbar {
          -ms-overflow-style: none; /* IE and Edge */
          scrollbar-width: none; /* Firefox */
      }
  }
  </script>
  {{-- @vite('resources/css/app.css') --}}
  <title>Notes App</title>
</head>
<body class="w-screen h-screen flex flex-row items-center justify-center gap-10 bg-gradient-to-r from-[#96f0ff] to-[#f065ff] p-10">
  <section class="flex-1 basis-1/5 border border-black h-full p-3 flex flex-col">
    <div class="basis-1/5 flex flex-col">
      <p class="text-center text-xs">Welcome to Notes App</p>
      <h3 class="text-center font-medium text-2xl">
        {{auth()->user()->name}}
      </h3>
      <form action="/logout-user" method="POST" class="w-full flex flex-col items-center justify-center gap-2 my-3">
        @csrf
          <button class="bg-red-800 text-white px-7 py-1 rounded-full text-xs">Logout</button>
          <a href="/update-user/{{auth()->user()->id}}" class="text-xs">Update Profile</a>
      </form>
    </div>
    <div class="basis-4/5 border-t border-black py-3">
      <h3 class="text-center mb-2 font-medium">Create New Note</h3>
      <form action="/add-new-note" method="POST" class="flex flex-col gap-2">
        @csrf
        <div class="flex items-center justify-around py-2">
          <input id="red-radio" type="radio" value="#fde047" name="noteColor" class="w-5 h-5 bg-yellow-300  focus:ring-black ring-white ring-4 focus:ring-4 appearance-none rounded-full checked:ring-black">
          <input id="red-radio" type="radio" value="#4ade80" name="noteColor" class="w-5 h-5 bg-green-400  focus:ring-black ring-white ring-4 focus:ring-4 appearance-none rounded-full checked:ring-black">
          <input id="red-radio" type="radio" value="#f9a8d4" name="noteColor" class="w-5 h-5 bg-pink-300  focus:ring-black ring-white ring-4 focus:ring-4 appearance-none rounded-full checked:ring-black">
          <input id="red-radio" type="radio" value="#d8b4fe" name="noteColor" class="w-5 h-5 bg-purple-300  focus:ring-black ring-white ring-4 focus:ring-4 appearance-none rounded-full checked:ring-black">
          <input id="red-radio" type="radio" value="#7dd3fc" name="noteColor" class="w-5 h-5 bg-sky-300  focus:ring-black ring-white ring-4 focus:ring-4 appearance-none rounded-full checked:ring-black">
        </div>
        <input type="text" name="noteTitle" id="note-title" class="rounded p-2 text-sm" placeholder="Note Title">
        <textarea name="noteContent" id="note-content" cols="20" rows="11" class="rounded p-2 text-sm resize-none" placeholder="Note Content"></textarea>
        <button class="bg-green-500 rounded font-bold py-1">Add Note</button>
      </form>
    </div>
  </section>
  <section class="flex-1 basis-4/5 h-full grid grid-cols-4 gap-2 overflow-y-auto no-scrollbar">
    @foreach ($notes as $note)
    <div class="min-h-[200px] max-h-[200px] border border-black p-2 relative" style="background-color: {{$note['color']}}">
      <h3 class="truncate font-bold">{{$note['title']}}</h3>
      <div class="break-words text-sm overflow-y-auto no-scrollbar max-h-[135px]">
        {{$note['content']}}
      </div>
      <div class="flex flex-row absolute right-2 bottom-0">
        <a href="/update-note/{{$note->id}}" class="mr-2">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
            <path d="M 46.574219 3.425781 C 45.625 2.476563 44.378906 2 43.132813 2 C 41.886719 2 40.640625 2.476563 39.691406 3.425781 C 39.691406 3.425781 39.621094 3.492188 39.53125 3.585938 C 39.523438 3.59375 39.511719 3.597656 39.503906 3.605469 L 4.300781 38.804688 C 4.179688 38.929688 4.089844 39.082031 4.042969 39.253906 L 2.035156 46.742188 C 1.941406 47.085938 2.039063 47.453125 2.292969 47.707031 C 2.484375 47.898438 2.738281 48 3 48 C 3.085938 48 3.171875 47.988281 3.257813 47.964844 L 10.746094 45.957031 C 10.917969 45.910156 11.070313 45.820313 11.195313 45.695313 L 46.394531 10.5 C 46.40625 10.488281 46.410156 10.472656 46.417969 10.460938 C 46.507813 10.371094 46.570313 10.308594 46.570313 10.308594 C 48.476563 8.40625 48.476563 5.324219 46.574219 3.425781 Z M 45.160156 4.839844 C 46.277344 5.957031 46.277344 7.777344 45.160156 8.894531 C 44.828125 9.222656 44.546875 9.507813 44.304688 9.75 L 40.25 5.695313 C 40.710938 5.234375 41.105469 4.839844 41.105469 4.839844 C 41.644531 4.296875 42.367188 4 43.132813 4 C 43.898438 4 44.617188 4.300781 45.160156 4.839844 Z M 5.605469 41.152344 L 8.847656 44.394531 L 4.414063 45.585938 Z"></path>
            </svg>
        </a>
        <form action="/delete-note/{{$note->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="text-red-500 font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0,0,256,256" style="fill:#000000;">
              <g fill="#ff0000" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M13,3c-0.26757,-0.00363 -0.52543,0.10012 -0.71593,0.28805c-0.1905,0.18793 -0.29774,0.44436 -0.29774,0.71195h-5.98633c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h18c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587h-5.98633c0,-0.26759 -0.10724,-0.52403 -0.29774,-0.71195c-0.1905,-0.18793 -0.44836,-0.29168 -0.71593,-0.28805zM6,8v16c0,1.105 0.895,2 2,2h14c1.105,0 2,-0.895 2,-2v-16z"></path></g></g>
            </svg>
          </button>
        </form>
      </div>
    </div>
    @endforeach
  </section>
  
</body>
</html>