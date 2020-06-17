<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href='css/estilos.css' >
      <link rel="stylesheet" href='css/materialize.css' >
      <link rel="stylesheet" href='css/materialize.min.css' >

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token()  }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   </head>
  
   <body class="login" background="img/fondoLogin.jpg">

<div class="padre">
<div class="col s12 opacity center ">
        <div class="row ">
              <div >
                <img  src="img/Logo500x250.png">
              </div>
        </div>

    @yield('login')

  </div>
</div>

      
     
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="js/plantilla.js"></script>
      

   </body>
</html>