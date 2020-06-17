<template>
<main>
<section class="header1 cid-rSu9iNdwKY mbr-parallax-background" id="header1-r">

    

    <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(85, 180, 212);">
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">
                    Contacto</h1> 
                
            </div>
        </div>
    </div>

</section>

<section class="mbr-section form4 cid-rSu8CtjXTZ" id="form4-p">

    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCy9r70T3NYf3PhvVflTo0_zdif2_IoIYs&amp;q=place_id:ChIJjwsSfUzXvIYR9THPwmVKAYE" allowfullscreen=""></iframe></div>
            </div>
            <div class="col-md-6">
                <h2 class="pb-3 align-left mbr-fonts-style display-2">
                    Contáctanos</h2>
                <div>
                    <div class="icon-block pb-3 align-left">
                        <span class="icon-block__icon">
                            <span class="mbri-letter mbr-iconfont"></span>
                        </span>
                        <h4 class="icon-block__title align-left mbr-fonts-style display-5">Para cotización o información</h4>
                    </div>
                    <div class="icon-contacts pb-3">
                        
                        <p class="mbr-text align-left mbr-fonts-style display-7">Matriz Culiacán:<br>Bvd. Constitución #1061 interior 106 PTE.<br>Col. Jorge Almada C.P.80200<br>Culiacán, Sinaloa<br>Teléfono: (667) 716-93-95<br>FAX: (667) 713-02-60<br><br>Mexicali:<br>Mar Baltico #217<br>Col. Anahuac C. P. 21060<br>Mexicali, Baja California, México.<br>Teléfono: (686) 555-6995<br><br>Hermosillo:<br>Londres 381 Esquina Jesus Ma. Ávila<br>Col. Centenario C.P. 83270<br>Hermosillo, Sonora, México<br>Teléfono: (662) 212-1615<br></p>
                    </div>
                </div>
                <div data-form-type="">
                    <!---Formbuilder Form--->
                    <form action="contacto" method="POST" class="mbr-form form-with-styler" id="form">
                        <input type="hidden" name="_token" :value="csrf" /> 
                        <div class="row">
                            <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Gracias por contactarnos!</div>
                            <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                            </div>
                        </div>
                        <div class="dragArea row">
                            <div class="col-md-6  form-group" data-for="name">
                                <input type="text" name="nombre" placeholder="Nombre" data-form-field="Name" required="required" class="form-control input display-7" id="name-form4-p">
                            </div>
                            <div class="col-md-6  form-group" data-for="phone">
                                <input type="text" name="telefono" placeholder="Teléfono" data-form-field="Phone" required="required" class="form-control input display-7" id="phone-form4-p">
                            </div>
                            <div data-for="email" class="col-md-12  form-group">
                                <input type="email" name="correo" placeholder="Correo" data-form-field="Email" class="form-control input display-7" required="required" id="email-form4-p">
                            </div>
                            <div data-for="message" class="col-md-12  form-group">
                                <textarea name="mensaje" placeholder="Mensaje" data-form-field="Message" required="required" class="form-control input display-7" id="message-form4-p"></textarea>
                            </div>
                            <div class="col-md-12 input-group-btn  mt-2 align-center"><button  type="submit" class="btn btn-primary btn-form display-4">Enviar mensaje</button></div>
                        </div>
                    </form><!---Formbuilder Form--->
                </div>
            </div>
        </div>
    </div>
</section>
</main>

</template>
<script>
    import Swal from 'sweetalert2';  

    $(document).on('submit', '[id^=form]', function (e) {
  e.preventDefault();
  var data = $(this).serialize();
  Swal.fire({
     icon: 'success',
     title: '¡Gracias por escribirnos!',
     text: 'En breve nos contactaremos contigo',
  }).then(function () {
      $('#form').submit();
  });
  return false;
   });

    export default {
        data(){
            return{ 
         csrf: document.head.querySelector('meta[name="csrf-token"]').content,
            }
        },      
        mounted() {
        }
     }
 </script>