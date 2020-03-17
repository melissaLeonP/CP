<!DOCTYPE html>
<html>
  <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href='css/plantilla.css' >
      <!-- <link rel="stylesheet" href='css/estilos.css' > -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css"> 
      <!--Let browser know website is optimized for mobile-->
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"/> -->
      <meta name="csrf-token" content="{{ csrf_token()  }}">
      <meta name="viewport" content="width=device-width, initial-scale=1">  
 
  <link href="https://unpkg.com/vueperslides/dist/vueperslides.css" rel="stylesheet">
        <!-- Styles -->
      <style>
       
       img{
          width: 100px;
          height: 60px;
       }
       nav{
        background-color: black;
       }
       footer{
        background-color: black;
       }
      </style>
   </head>

   <!-- <nav>
    <div class="nav-wrapper "> -->
      <!-- <a href="#" src="img/logoBlanco.png" class="brand-logo"></a> -->
      <!-- <a href="#"><img id="navImagen" class="" src="img/logoBlanco.png" style="" alt=""></a>
      <ul id="nav-mobile" class="right "> -->
      <!-- <li><img class="" src="img/logoBlanco.png" alt=""></li> -->
        <!-- <li><a href="sass.html"></a></li>
        <li><a href="badges.html">slider</a></li>
        <li><a href="collapsible.html">productos</a></li>
        <li><a href="collapsible.html">categorias</a></li>
        <li><a href="collapsible.html">cambiar contraseña </a></li>
        <li><a href="collapsible.html">cerrar</a></li>
      </ul>
    </div>
  </nav> -->
 
  
  <body>
     <div id="app">
       <br>

       @include('contenido.consola')

       @yield('consola')
     </div>

    <footer class=" ">
      
        <div class="container brown-text">
         <p class="white-text"> © 2020 Copyright</p>
        <a class="brown-text right" href="#!"></a>
        </div>
  
    </footer>
    
  </body>


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

   
</html>
