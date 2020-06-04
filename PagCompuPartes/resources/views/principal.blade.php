<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/favicon-128x128.png" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Compupartes</title>
    
    <link rel="stylesheet" href='css/plantilla.css' >


<!-- <link rel="stylesheet" href="../resources/assets/plantillas/css/mobirise-icons-bold.css">
    <link rel="stylesheet" href="../resources/assets/plantillas/css/mobirise-icons.css"> -->

    <!-- <link rel="stylesheet" href="resources/assets/plantillas/css/tether.min.css">
    <link rel="stylesheet" href="resources/assets/plantillas/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/assets/plantillas/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="resources/assets/plantillas/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="resources/assets/plantillas/css/styles.css">
    <link rel="stylesheet" href="resources/assets/plantillas/css/style.css">
    <link rel="stylesheet" href="resources/assets/theme/css/style.css">
    <link rel="stylesheet" href="resources/assets/plantillas/css/mbr-additional.css" type="text/css"> -->

</head>
<body>
    <div id="app">
    @include('plantilla.nav')

    <!-- Contenido principal -->
    @yield('contenido')
    <!-- Contenido pincipal fin -->

    <!-- Footer -->
    <section class="cid-rSk8ZA7DKp" id="footer1-5">
    <div class="container">
        <div class="media-container-row content text-white">
            <div class="col-12 col-md-3">
                <div @click="menu=1" class="media-wrap">
                    <a >
                        <img src="img/logo-whiteline-horizontal-724x192.png"  title="">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3"></h5>
                <p class="mbr-text"><br><br></p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Matriz</h5>
                <p class="mbr-text">Matriz Culiacán:<br>Bvd. Constitución #1061 interior 106 PTE.<br>Col. Jorge Almada C.P.80200<br>Culiacán, Sinaloa<br>Teléfono: (667) 716-93-95<br>FAX: (667) 713-02-60<br><br>contacto@compupartes.com.mx<br>ventas@compupartes.com.mx<br></p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Sucursales</h5>
                <p class="mbr-text">Mexicali:<br>Mar Baltico #217<br>Col. Anahuac C. P. 21060<br>Mexicali, Baja California, México.<br>Teléfono: (686) 555-6995<br><br>Hermosillo:<br>Londres 381 Esquina Jesus Ma. Ávila<br>Col. Centenario C.P. 83270<br>Hermosillo, Sonora, México<br>Teléfono: (662) 212-1615</p>
            </div>
        </div>
        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
            <div class="media-container-row mbr-white">
                <div class="col-sm-6 copyright">
                    <p class="mbr-text mbr-fonts-style display-7"><a @click="menu=1">Aviso de Privacidad&nbsp;</a><br>Copyright © 2020 Compupartes y Accesorios S.A. de C.V</p>
                </div>
                <div class="col-md-6">
                    <div class="social-list align-right">
                        <div class="soc-item">
                            <a href="https://twitter.com/mobirise" target="_blank">
                                <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                                <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.youtube.com/c/mobirise" target="_blank">
                                <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

</body>
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="js/plantilla.js"></script>
      <script src="js/app.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      

</html>