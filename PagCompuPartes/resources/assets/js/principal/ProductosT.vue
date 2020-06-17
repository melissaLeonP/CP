<template>
<main>


<section class="header1 cid-rW45Ce2f3b mbr-parallax-background" id="header1-1s">
    <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(85, 180, 212);">
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">
                    Productos</h1>
            </div>
        </div>
    </div>
</section> 


<section class="services1 cid-rW45zKP9am" id="services1-1q">
    <!--Overlay-->
    
    <!--Container-->
    <div class="container">
        <div class="row justify-content-center">           
            <div v-for="producto in splitedList" :key="producto.idProducto "   class="card col-12 col-md-6 p-3 col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img :src="'img/'+ producto.imagen"  title="">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-5">{{ producto.nombre}}</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                          Características: 
                            <p class="espacio"  v-for="(caracteristica, index) in producto.nombreCaracteristica" :key="index">
                             ·{{caracteristica}}
                            </p>

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
        props:{
            idcategoria: Number
        },
        data(){
            return{
            arrayProductos:[],
            arrayCaracteristicas:[],
            arrayCaracteristicasN:[],
            idcate: '',
            titulo: []
            }
        },
        methods:{
            listarProductos(id){
                let m=this;
                axios.get('/productos/'+id).then(function (response){
                        m.arrayProductos = response.data;
                        // m.titulo = response.nombreCategoria.data;
                        // console.log("Titulo: "+m.titulo);
                    })
                    .catch(function(error){
                        console.log(error);
                    });
            }
        },
        computed:{
            splitedList(){
                let newArr = [...this.arrayProductos]
                newArr.map(el => {
                    return el.nombreCaracteristica = el.nombreCaracteristica.split(',')
                })
                return newArr
            }
        },
       async mounted() {
            let m=this;
             m.idcate = await m.idcategoria;
            // alert(m.idcate);
            // console.log('Id:'+m.idcategoria);
            m.listarProductos(m.idcate);
        }
     }
</script>