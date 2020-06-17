<template>
<main>

<section class="header1 cid-s07PNQhdN1 mbr-parallax-background" id="header1-24">

    
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1"></h1>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2"></h3>
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">&nbsp; &nbsp;</p>
                
            </div>
        </div>
    </div>

</section>
    <section  class="features18 popup-btn-cards cid-rVACXOF7Ba" id="features18-18">

        <div   class="container">
             
            <div class="row center" >
            
            <div class="" v-for="categorias  in arrayCategorias" :key="categorias.idCategoria"  >
              
                <div class="card  col-6 col-md-6">
                    <div class="card-wrapper tarjeta" >
                        <div class="card-img">
                            <div class="mbr-overlay"></div>
                            <div class="mbr-section-btn text-center"><a  @click="cambiarMenu(5,categorias.idCategoria)" class="btn btn-primary display-4"> Ver más</a></div>
                            <img :src="'img/'+categorias.imagen"  class="tImagenP" title="">
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style display-7"><a @click="cambiarMenu(5,categorias.idCategoria)" class="text-black">
                                {{categorias.nombre}}</a></h4> 
                        </div>
                    </div>
                </div>             

                
            </div>
            </div>

        </div>
    </section>
</main>

</template>
<script>
  
    export default {
        data(){
            return{
            arrayCategorias:[],
            n:0
            }
        },
        methods:{
            listarCategorias(){
                let m=this;
                // m.listado=1;
                axios.get('/categoriaT').then(function (response){
                        m.arrayCategorias = response.data;
                    
                    })
                    .catch(function(error){
                        console.log(error);
                    });
            },
            cambiarMenu(menu,id){
                let m=this;
                var objeto = {
                    valorMenu: menu,
                    valorId: id
                }
                 m.$emit("actualizar-menu",objeto);
            },
        },
        mounted() {
            this.listarCategorias();
        }
     }
 </script>