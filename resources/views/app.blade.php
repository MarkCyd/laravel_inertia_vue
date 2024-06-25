<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
    @inertiaHead
    @routes {{-- insert this so that we can use route with the help of ziggy plugin --}}
  </head>
  <body>
    @inertia
  </body>
</html>