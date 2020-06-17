<template>
    <main class="main">
        <!-- abrir modal -->
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div  class = "container">
                    <h4 class="modal-title center" v-text="tituloModal"></h4>   
                    <div class="col s5 center">
                        <img v-if="tipoAccion==2" :src="'img/'+img"  class="imagenEdit tImagen" alt="">
                    </div>
                    

                    <br> 
                    <input  id="nombre" type="text" v-model="texto" placeholder="Texto del slider" class="validate">
                            <label class="activate" for="Texto"></label>

                    <br> 
                   ¿Desea agregar botón?
                    <p>

                     <label>
                        <input class="with-gap" name="group1"  value="si" type="radio" checked />
                        <span>Si</span>
                    </label>
                    
                    <label>
                        <input name="group1" value="no" type="radio" />
                        <span>No</span>
                    </label>
                    </p>
                     <input  id="boton" type="text" v-model="textoBoton" placeholder="Texto del botón" class="validate">
                            <label class="activate" for="boton"></label>
                    <br>
                    <input  id="boton" type="text" v-model="linkBoton" placeholder="Link del botón" class="validate">
                            <label class="activate" for="boton"></label>
                    <br>
                    <div class="form-group row">
                        <div class="col s10 center">
                            <div class="file-field input-field">
                                <div class="waves-effect waves-light btn color">
                                    <span>Imagen</span>
                                    <input id="file" ref="filea"  type="file" data-vv-scope="new"  required="true" aria-required="true"  v-on:change="seleccionarImagen(1)" class="sliderAlta">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div> 
                    </div> 
                    <div v-show="errorSlider" class="form-group row div-error">
                            <div class="text-center text-error">
                                <div v-for="error in errorMostrarMsjSlider" :key="error" v-text="error">

                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" v-if="tipoAccion==1" class="color espacioButton waves-effect waves-light btn" @click="nuevoSlider()">Guardar</button>
                        <button type="button" v-if="tipoAccion==2" class="color espacioButton waves-effect waves-light btn" @click="actualizarSlider(idSlider)">Actualizar</button>
                        <button type="button" class="color espacioButton waves-effect waves-light btn " @click="cerrarModal()">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>  
        <!-- cerrar modal -->
        <!-- agregar sliders -->
        <div class="row">
            <div class="col s12 l12">
                <h3 class="center">Sliders</h3>
                <div class="right col s2 l4">
                    <a class="waves-effect color btn right" @click="abrirModal('sliders','registrar')"><i class="material-icons left">add</i>Nuevo Slider</a>
                </div>
            </div>
        </div>
        <!-- empieza la actualizacion de sliders-->

        <div class="row cardsSlider">
            <div class="col s12 m12 lg12">
                <div class="card" v-for="slider in arraySliders" :key="slider.idSlider">
                    <div class="card-image">
                        <img class="responsiveImg" :src="'img/'+slider.img">
                        <a  class="btn-floating halfway-fab waves-effect waves-light red" @click="abrirModal('sliders','actualizar',slider)"><i class="material-icons">create</i></a>
                    </div>
                    <div class="card-content">
                        <p>{{slider.titulo}}</p>
                        <p>{{slider.texto}}</p>
                        <p v-if="slider.textoBoton">Botón: {{slider.textoBoton}}</p>
                        <p>{{slider.linkBoton}}</p>


                    </div>
                </div> 
            </div>
        </div>
        <br>
        <br>

    </main>
</template>
<script>
export default {
    data(){
        return{
            arraySliders:[],
            img: '', 
            modal : 0,
            texto: '',
            textoBoton: '',
            linkBoton:'',
            tituloModal : '' ,
            cambio : 0,
            tipoAccion : 0,
            idSlider: 0,
            file: '',
            radio:'',
            errorSlider:'',
            errorMostrarMsjSlider: [],
        }
    },
    methods:{
        listarSliders(){
            let m=this;
            axios.get('/slider').then(function (response){
                m.arraySliders = response.data;
            })
            .catch(function(error){
                console.log(error);
            });
        },
        limpiar() {
            let me = this;
            me.errors.clear('new');
            me.errors.clear('update');
            me.img = '';
            me.tipoAccion = 0;
            me.Cambio = 0;
            me.textoBoton='';
            me.linkBoton='';
            me.texto='';
            $("#file").val("");
        },
        seleccionarImagen(img){
            if (img == 1) {            
                this.file = this.$refs.filea.files[0];
                readURL(document.getElementsByClassName("sliderAlta")[0], 1);
            }
            else {
                this.file = this.$refs.filec.files[0];
                readURL(document.getElementsByClassName("sliderEdit")[0], 2);
            }
            this.cambio = 1;

            function readURL(input, img) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        if (img == 1) {
                            $('.imgAlta').attr('src', e.target.result);
                        }
                        else {
                            $('.imgCambio').attr('src', e.target.result);
                        }
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        },
        nuevoSlider() {
            if (this.validarSlider()){
                    return;
                }
            let me = this;
            let formData = new FormData();
            radio = $('input[name="group1"]:checked').val();
            if(radio == "si"){
                formData.append('radio',radio);
                formData.append('file', me.file);
                formData.append('textoBoton', me.textoBoton);
                formData.append('linkBoton', me.linkBoton);
                formData.append('texto', me.texto);
            }else{
                formData.append('file', me.file);
                // formData.append('textoBoton', me.textoBoton);
                // formData.append('linkBoton', me.linkBoton);
                formData.append('texto', me.texto);
            }

            
            
            axios.post('/slider/registrar', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            })
            .then(function (response) {
                me.listarSliders();
                me.cerrarModal();
                me.limpiar();
            })
            .catch(function (error) {
                console.log(error);
            });
        },
       actualizarSlider(idSlider){
                if (this.validarSlider()){
                    return;
                }
                let me = this;

                let formData = new FormData();

            let radio = $('input[name="group1"]:checked').val();
             if(radio == "si"){
                formData.append('radio',radio);
                formData.append('idSlider',idSlider);
                formData.append('file', me.file);
                formData.append('textoBoton', me.textoBoton);
                formData.append('linkBoton', me.linkBoton);
                formData.append('texto', me.texto);
            }else{
                formData.append('idSlider',idSlider);
                formData.append('file', me.file);
                // formData.append('textoBoton', me.textoBoton);
                // formData.append('linkBoton', me.linkBoton);
                formData.append('texto', me.texto);
            }
                
                // formData.append('file', me.file);
                // formData.append('idSlider',idSlider);
                // formData.append('texto', me.texto);
                // formData.append('textoBoton', me.textoBoton);
                // formData.append('linkBoton', me.linkBoton);

                // Regresamos la informacion
                axios.post('/slider/actualizar', formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function (response) {
                    me.listarSliders();
                    me.cerrarModal();
                    me.limpiar();
                
                })
                .catch(function (error) {
                    console.log(error);
                    });
            },
        cerrarModal(){
            this.modal=0;
            this.tituloModal='';
            this.img='';
            this.file='';
            this.titulo='';
            this.texto='';
        },
        abrirModal(modelo,accion, data = []){
            switch(modelo){
                case "sliders":{
                    switch(accion){
                        case 'registrar':{
                            this.modal = 1;
                            this.textoBoton ='';
                            this.linkBoton ='';
                            this.texto = '';
                            this.file='';
                            this.tipoAccion = 1;
                            this.tituloModal = 'Registrar Sliders';
                            this.img = '';
                            break;
                        }
                        case 'actualizar':{
                            this.modal = 2;
                            this.textoBoton = data['textoBoton'];
                            this.linkBoton = data['linkBoton'];
                            this.texto = data['texto'];
                            this.tipoAccion = 2;
                            this.file='';
                            this.tituloModal = 'Actualizar Slider';
                            this.idSlider=data['idSlider'];
                            this.img=data['img'];
                            break;
                        }
                    }

                }
            }

        },
        validarSlider(){
            this.errorSlider=0;
            this.errorMostrarMsjSlider =[];
            if (!this.file ) this.errorMostrarMsjSlider.push("Se tiene que ingresar una imagen.");
            if (!this.texto) this.errorMostrarMsjSlider.push("El texto del Slider no puede estar vacío.");  
            let radio = $('input[name="group1"]:checked').val();
            if(radio == 'si'){
                if (!this.textoBoton) this.errorMostrarMsjSlider.push("El texto del botón no puede estar vacío.");  
                if (!this.linkBoton) this.errorMostrarMsjSlider.push("El link del botón no puede estar vacío.");  

            }
            if (this.errorMostrarMsjSlider.length) this.errorSlider = 1;

            return this.errorSlider;
        },
    },
    mounted(){
        this.listarSliders();
    }
};
</script>

<style>
.modal-content{
    width: 100% !important;
    position: absolute !important;
    height: 600px;
}
.mostrar{
    display: list-item !important;
    opacity: 1 !important;
    position: absolute !important;
    z-index: 100;
}
.centrado{
    max-height:560px !important;
     margin-left: 20% !important;
     margin-right: 30% ;
}
.espacioButton{
    margin-left: 10px !important;
}


</style>