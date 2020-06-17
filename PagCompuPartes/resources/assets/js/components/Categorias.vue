<template>
    <main class="main">
        
        <!-- Inicia modal agregar/actualizar Categoria -->
               <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg " role="document">
                <div class = "container">
                    <br>
                    <div class="center">
                        <h3 v-text="tituloModal"></h3>
                    </div>
                   <div class="col s5 center">
                        <img v-if="tipoAccion==2" :src="'img/'+imagen"  class="imagenEdit tImagen" alt="">
                    </div>
                    <div class="form-group row">
                        <!-- input para el nombre del producto --> 
                        <input id="nombre" type="text" v-model="nombre" placeholder="Nombre de la categoría"  class="validate" >
                        <!-- <label  for="nombre">Nombre</label> -->
                        <br>  
                        <!-- select Subcategorias --> 
                        <div>
                            
                            <label class="typo__label">Selecciona las características</label>
                            <multiselect v-model="arrayIdCaracteristica" :options="arrayCaracteristicas" label="nombre" track-by="idCaracteristica" :multiple="true">
                                <!-- <pre class="language-json"><code>{{ idTalla.Talla }}</code></pre> -->
                            </multiselect>
                        <!-- </div> -->
                        <br>
                       </div> 
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
                    <div v-show="errorCategoria" class="form-group row div-error">
                        <div class="text-center text-error">
                            <div v-for="error in errorMostrarMsjCategoria" :key="error" v-text="error">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                       <a class=" espacioButton waves-effect waves-light btn color" v-if="tipoAccion==1"  @click="nuevaCategoria()">Guardar</a>
                       <a class=" espacioButton waves-effect waves-light btn color" v-if="tipoAccion==2"  @click="actualizarCategoria(idCategoria)">Actualizar</a>
                       <button type="button" class=" espacioButton btn btn-secondary color" @click="cerrarModal()">Cerrar</button>
                     </div>
                </div>
            </div>
         </div>  
         </div>  

       <!-- Termina modal  agregar/actualizar Categoria-->

     <!-- Botón para agregar categorías -->
        <div class="row">
            <div class="col s12 l12">  
                <h3 class="center">Categorías</h3>  
                <div class="right col s2 l4">
                    <a class="waves-effect btn color right" @click="abrirModal('Categoria','registrar')"><i class="material-icons left">add</i>Nueva categoría</a>
                </div>
            </div>
        </div>
     <!-- Termina botón para agregar categorías -->

       <!-- Mostrar Categoria -->
               
        <div class="row">
            <div class="col s10 l10 centro">
                 <table class="centered">
                    <thead>
                    <tr>
                        <th class="hide-on-small-only">Imagen</th>
                        <th >Nombre</th>
                        <th class="hide-on-small-only">Características</th>
                        <th class="hide-on-small-only">Status</th>
                        <th>Editar</th>
                        <th>Desactivar/Activar</th>


                    </tr>
                    </thead>
                    <tbody  v-for="categoria in arrayCategoria" :key="categoria.idCategoria">
                    <tr>
                        <td class="hide-on-small-only" ><img :src="'img/'+categoria.imagen" class=" tImagen" ></td>
                        <td v-text="categoria.nombre"></td> 
                        <td class="hide-on-small-only"  v-text="categoria.nombreCaracteristica"></td>
                        <td class="hide-on-small-only"  v-if="categoria.status == 1">Activado</td>
                        <td class="hide-on-small-only"  v-if="categoria.status == 0">Desactivado</td>
                        <td>
                            <i class="material-icons color-text " @click="abrirModal('Categoria','actualizar',categoria,categoria.idCategoria)">create</i>
                        </td>
                        <td class="desactivarActivar">
                            <a href="#!" class="secondary-content" v-if="categoria.status == 1">
                                <i class="switch">
                                    <label><input type="checkbox" checked="checked" name="status" v-model="categoria.status" @click="desactivarCategoria(categoria.idCategoria)"><span class="lever"></span></label>
                                </i>
                            </a>
                            <a href="#!" class="secondary-content" v-if="categoria.status == 0">
                                <i class="switch">
                                    <label><input type="checkbox"  name="status" v-model="categoria.status" @click="activarCategoria(categoria.idCategoria)"><span class="lever"></span></label>
                                </i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
                
        </div>
       <!-- Termina mostrar Categoria -->
    
    </main>
</template>

<script>
import Swal from 'sweetalert2';
import Multiselect from 'vue-multiselect'

document.addEventListener('DOMContentLoaded', function() {
                        var elems = document.querySelectorAll('select');
                        var instances = M.FormSelect.init(elems);
                    });

    export default {
        data(){
            return{
                idCategoria: 0,
                nombre: '',
                imagen: '', 
                file: '',
                status : true,
                arrayCategoria:[],
                idCaracteristica: 0,
                arrayCaracteristicas: [],
                arrayIdCaracteristica:[],
                arrayCaracteristicaCategoria:[],
                modal : 0,
                tituloModal : 'Registrar Categorias' ,
                cambio : 0,
                tipoAccion: 0,
                errorCategoria : 0,
                errorMostrarMsjCategoria : []
            }
        },
        methods: {
            // Asignar los datos de las categorías al array
            listarCategoria(){
             let m=this;
             axios.get('/categoria').then(function (response){
                    m.arrayCategoria = response.data;
                    m.status = response.status.data;
                    if(status == true){
                        status = 1
                    }else{
                        status = 0
                    }
                  
                })
                .catch(function(error){
                    console.log(error);
                });
            },
            limpiar() {
                let me = this;
                me.idCategoria=0;
                me.nombre= '';
                me.status = true;
                me.tipoAccion= 0;
                me.errorCategoria = 0;
                me.errorMostrarMsjCategoria = [];
                me.Cambio = 0;
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
            nuevaCategoria() {
                if (this.validarCategoria()){
                    return;
                }
                let me = this;
                
                let formData = new FormData();
                formData.append('file', me.file);
                formData.append('nombre', me.nombre);
                formData.append('idCarac', me.arrayIdCaracteristica.map(item => item.idCaracteristica).join(','));

                //Registramos la informacion
                axios.post('/categoria/registrar', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function (response) {
                    me.cerrarModal();
                    me.listarCategoria();
                })
                .catch(function (error) {
                    console.log(error);
                });
            
            },
            verSelects(){
                let me=this;
                me.listado=2;
                //Obtener los datos del ingreso de sub categorias
                var url= '/caracteristicas';
                axios.get(url).then(function (response) {
                    var arrayCaracteristicas = response.data;
                    me.arrayCaracteristicas = arrayCaracteristicas.map(object => ({idCaracteristica: object.idCaracteristica, nombre: object.nombre})); 
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cerrarModal(){
                this.modal=0;
                this.nombre="";
                this.Status='1';
                this.tituloModal='';
                this.errorCategoria=0;
               this. arrayIdCaracteristica=[];
                

            },
            abrirModal(modelo,accion, data = [],idCategoria){
                let m=this;
                switch(modelo){
                    case "Categoria":{
                        switch(accion){
                            case 'registrar':
                                {
                                    this.modal = 1;
                                    this.nombre = '';
                                    this.status = '';
                                    this.tipoAccion = 1;
                                    this.tituloModal = 'Registrar categoría';
                                    break;
                                }
                            case 'actualizar':
                                {
                                    this.modal = 2;
                                    this.tipoAccion = 2;
                                    this.idCategoria = data['idCategoria'];
                                    this.nombre = data['nombre'];
                                    this.imagen=data['imagen'];
                                    this.idCaracteristica=data['idCaracteristica'];
                                    this.tituloModal = 'Actualizar categoría';

                                var urld= '/caracteristica_categoria?idCategoria='+idCategoria;
                                axios.get(urld).then(function (response) {
                                    console.log('estoy asignando los datos al array');
                                    m.arrayIdCaracteristica = response.data;

                                })
                                .catch(function (error) {
                                    console.log(error);
                                });

                                    // break;
                                }
                        }
                    }
                }
            },
            actualizarCategoria(idCategoria){
                let me = this;

                let formData = new FormData();
                formData.append('file', me.file);
                formData.append('nombre', me.nombre);
                formData.append('idCategoria',idCategoria);
                formData.append('idCarac',me.arrayIdCaracteristica.map(item => item.idCaracteristica).join(','));

                //Registramos la informacion
                axios.post('/categoria/actualizar',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function (response) {
                    me.listarCategoria();
                    me.cerrarModal();
                    me.limpiar();                    
                })
                .catch(function (error) {
                    console.log(error);
                });      
            },
            desactivarCategoria(idCategoria){
                let me = this;
            
                Swal.fire({
                title: '¿Está seguro de desactivar esta Categoria?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                    if (result.value) {
 
                        axios.put('/categoria/desactivar',{
                            'idCategoria': idCategoria
                        }).then(function (response) {
                            Swal.fire(
                                'Desactivado!',
                                'La categoría ha sido desactivada con éxito.',
                                'success'
                            )
                          me.listarCategoria();
                        }).catch(function (error) {
                            console.log(error);
                        });                    
                    } else if  (
                            // Read more about handling dismissals
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                          me.listarCategoria();
                        
                    } 
                })
       
            },
            activarCategoria(idCategoria){
                let me = this;
            
                Swal.fire({
                title: '¿Está seguro de activar esta Categoría?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                    if (result.value) {
 
                        axios.put('/categoria/activar',{
                            'idCategoria': idCategoria
                        }).then(function (response) {
                            Swal.fire(
                                'Activado!',
                                'La categoría ha sido activada con éxito.',
                                'success'
                            )
                          me.listarCategoria();
                        }).catch(function (error) {
                            console.log(error);
                        });                    
                    } else if  (
                            // Read more about handling dismissals
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                          me.listarCategoria();
                        
                    } 
                })
       
            },
            validarCategoria(){
                this.errorCategoria=0;
                this.errorMostrarMsjCategoria =[];
                // if (!this.Nombre) this.errorMostrarMsjCategoria.push("El nombre de la Categoría no puede estar vacío.");
                if(!isNaN(this.NombreSub))this.errorMostrarMsjCategoria.push("El nombre de la Categoría no puede ser numérico.");
                if (this.errorMostrarMsjCategoria.length) this.errorCategoria = 1;
                return this.errorCategoria;
            },
            updateSelected: function (newSelected) {
                this.selected = newSelected
            },
            addTag (newTag) {
                this.idCaracteristica.push(tag);
                // this.idTalla.push(tag);
            }
        
        },components: {
            Multiselect
        }
            ,mounted(){
            this.listarCategoria();
            this.verSelects();
          
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
        height:560px;
        margin-left: 20%;
        margin-right: 30%;
    }
    .espacioButton{
        margin-left: 10px !important;
    }
</style>
