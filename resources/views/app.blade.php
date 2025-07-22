<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    @vite('resources/js/app.js')
    @inertiaHead
  </head>
  <body class="{{ request()->is('admin/*') ? 'bg-red-800' : 'bg-gray-300' }}">
    @inertia
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  </body>
</html>
