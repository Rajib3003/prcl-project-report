<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel + React App</title>

    {{-- 👉 React + Vite integration এখানে --}}
   <!-- @viteReactRefresh -->
    @vite('resources/js/app.jsx')
  </head>

  <body>
    {{-- React অ্যাপ এখানে মাউন্ট হবে --}}
    <div id="app"></div>
  </body>
</html>
