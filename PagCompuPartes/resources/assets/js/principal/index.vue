<template>
    <main>
        <!-- Slider -->
        <section class="carousel slide cid-rSk7ZT3KT9" data-interval="false" id="slider1-0">
            <div class="full-screen">
                <div class="mbr-slider slide carousel" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="6000">
                    <!-- puntos -->
                    <ol class="carousel-indicators">
                        <li data-app-prevent-settings="" data-target="#slider1-0" data-slide-to="0"></li>
                        <li data-app-prevent-settings="" data-target="#slider1-0" data-slide-to="1"></li>
                        <li data-app-prevent-settings="" data-target="#slider1-0" class=" active" data-slide-to="2"></li>
                    </ol>
                    <!-- puntos -->
                    <div class="carousel-inner" role="listbox">
                        <div v-for="(slider,index) in arraySlider" :key="slider.idSlider" class="carousel-item slider-fullscreen-image " :class="{ 'active': index==0 }" data-bg-video-slide="false" v-bind:style="{ backgroundImage: 'url(img/' + slider.img + ')' }" >
                            <div class="container container-slide">
                                <div class="image_wrapper">
                                    <div class="mbr-overlay">
                                    </div>
                                    <div class="carousel-caption justify-content-center">
                                        <div class="col-10 align-right">
                                            <h2 class="mbr-fonts-style display-1"></h2>
                                            <p v-if="slider.texto" class="lead mbr-text mbr-fonts-style display-5">
                                                {{slider.texto}}
                                            </p>
                                            <div  v-if="slider.linkBoton" class="mbr-section-btn" buttons="0">
                                                <a  class="btn display-4 btn-primary" v-bind:href="slider.linkBoton" target="_blank">
                                                   {{slider.textoBoton}}
                                                </a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>  
                    <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#slider1-0">
                        <span aria-hidden="true" class="mbri-left mbr-iconfont"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next" href="#slider1-0">
                        <span aria-hidden="true" class="mbri-right mbr-iconfont"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>
<!-- Texto -->
<section class="mbr-section article content9 cid-rSk8s9FhkU" id="content9-2">

    <div class="container">
        <div class="inner-container" style="width: 100%;">
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-fonts-style display-5">
                El equipo experimentado que te entrega soluciones tecnológicas para cubrir tus necesidades estratégicas y alcanzar tus metas.
            </div>
            <hr class="line" style="width: 25%;">
        </div>
    </div>
</section>

<!-- Soluciones -->
<section class="features12 cid-rSkcCkneB4" id="features12-6">
    <div class="container">
        <div class="media-container-row pt-5">
            <div class="block-content align-right">
                <div class="card pl-3 pr-3 pb-5">
                    <div class="mbr-card-img-title">
                        <div class="card-img pb-3">
                             <span class="mbri-upload mbr-iconfont"></span>
                        </div>
                        <div class="mbr-crt-title">
                            
                        </div>
                    </div>                

                    <div class="card-box">
                        <p class="mbr-text mbr-section-text mbr-fonts-style display-7">
                            Estrategia de TI
                        </p>
                    </div>
                </div>

                <div class="card pl-3 pr-3">
                    <div class="mbr-card-img-title">
                        <div class="card-img pb-3">
                            <span class="mbr-iconfont mobi-mbri-database mobi-mbri"></span>
                        </div>
                        <div class="mbr-crt-title">
                            
                        </div>
                    </div>
                    <div class="card-box">
                        <p class="mbr-text mbr-section-text mbr-fonts-style display-7">
                            Infraestructura Tecnologica
                        </p>
                    </div>
                </div>
            </div>

            <div class="mbr-figure m-auto" style="width: 50%;">
                <img src="img/background6.jpg" title="">
            </div>

            <div class="block-content align-left">
                <div class="card pl-3 pr-3 pb-5">
                    <div class="mbr-card-img-title">
                        <div class="card-img pb-3">
                             <span class="mbri-features mbr-iconfont"></span>
                        </div>
                        <div class="mbr-crt-title">
                            
                        </div>
                    </div>                

                    <div class="card-box">
                        <p class="mbr-text mbr-section-text mbr-fonts-style display-7">Operaciones de TI<br></p>
                    </div>
                </div>

                <div class="card pl-3 pr-3">
                    <div class="mbr-card-img-title">
                        <div class="card-img pb-3">
                            <span class="mbr-iconfont mbri-lock"></span>
                        </div>
                        <div class="mbr-crt-title">
                            
                        </div>
                    </div>
                    <div class="card-box">
                        <p class="mbr-text mbr-section-text mbr-fonts-style display-7">Seguridad de Información<br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Socios comerciales -->
<section class="clients cid-rSk8V5NLND mbr-parallax-background" data-interval="false" id="clients-4">
      

    <div class="mbr-overlay" style="opacity: 0.9; background-color: rgb(20, 157, 204);">
    </div>
        <div class="container mb-5">
            <div class="media-container-row">
                <div class="col-12 align-center">
                    <h2 class="mbr-section-title pb-3 mbr-fonts-style display-2">
                        Socios Comerciales</h2>
                    
                </div>
            </div>
        </div>

    <div class="container">
        <div class="carousel slide" role="listbox" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="4000">
            <div class="carousel-inner" data-visible="3">
                 <div class="carousel-item active">
                        <div class="media-container-row">
                            <div class="col-md-12">
                                <div class="wrap-img">
                                    <img src="img/vmware-480x570.png" class="img-responsive clients-img" alt="" title="">
                                </div>
                            </div>
                        </div>
                </div> 
                <div class="carousel-item ">
                        <div class="media-container-row">
                            <div class="col-md-12">
                                <div class="wrap-img ">
                                    <a href="https://www.hpe.com/mx/es/home.html"><img src="img/hpe-1-1200x1424.png" class="img-responsive clients-img" alt="" title=""></a>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="carousel-item ">
                        <div class="media-container-row">
                            <div class="col-md-12">
                                <div class="wrap-img ">
                                    <img src="img/apple-1200x1424.png" class="img-responsive clients-img" alt="" title="">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="carousel-item ">
                        <div class="media-container-row">
                            <div class="col-md-12">
                                <div class="wrap-img ">
                                    <img src="img/impervalogo-3-1200x1424.png" class="img-responsive clients-img" alt="" title="">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="carousel-item ">
                        <div class="media-container-row">
                            <div class="col-md-12">
                                <div class="wrap-img ">
                                    <img src="img/microsoft-1200x1424.png" class="img-responsive clients-img" alt="" title="">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="carousel-item ">
                        <div class="media-container-row">
                            <div class="col-md-12">
                                <div class="wrap-img ">
                                    <img src="img/checkpoint.-1-1200x1424.png" class="img-responsive clients-img" alt="" title="">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="carousel-item ">
                        <div class="media-container-row">
                            <div class="col-md-12">
                                <div class="wrap-img ">
                                    <img src="img/apclogo-1200x1424.png" class="img-responsive clients-img" alt="" title="">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="carousel-item ">
                        <div class="media-container-row">
                            <div class="col-md-12">
                                <div class="wrap-img ">
                                    <img src="img/logoredhat-1-680x807.png" class="img-responsive clients-img" alt="" title="">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="carousel-item ">
                        <div class="media-container-row">
                            <div class="col-md-12">
                                <div class="wrap-img ">
                                    <img src="img/logofortinet-2-680x807.png" class="img-responsive clients-img" alt="" title="">
                                </div>
                            </div>
                        </div>
                </div>
                </div>
            <!-- <div class="carousel-controls">
                <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev">
                    <span aria-hidden="true" class="mbri-left mbr-iconfont"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next">
                    <span aria-hidden="true" class="mbri-right mbr-iconfont"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div> -->
        </div>
    </div>
</section>


</main>

</template> 
<script>
  
    export default {
        data(){
            return{ 
            img: '',
            file:'',
            arraySlider:[]
            }
        },
        methods:{
        listarSliders(){
            let m=this;
            // m.listado=1;
             axios.get('/slider/index').then(function (response){
                    m.arraySlider = response.data;
                  
                })
                .catch(function(error){
                    console.log(error);
                });
        },
        },
        mounted() {
            this.listarSliders();
        }
     }
 </script>