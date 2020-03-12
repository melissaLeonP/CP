<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

      <style>
      </style>
   </head>
  
   <body>
        <div id="app">
        @include('plantilla.consolaNavbar')      

        <h1>hola</h1>
        @yield('consola')

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="js/plantilla.js"></script>
        <script src="js/app.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://unpkg.com/vue"></script>
        <script src="https://unpkg.com/vueperslides"></script>

        
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems);
            });
            document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, {closeOnClick: true});
    });
    
    </script>

   </body>
</html>
