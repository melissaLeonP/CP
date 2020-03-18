<template>
    <main class="main">
        
        <!-- Inicia modal agregar/actualizar Categoria -->
         <!--     
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="container">
                    <h3 v-text="tituloModal"></h3>
                    <div class="input-field "> -->
                            <!-- input para el nombre de la Categoria -->
         <!--                         
                        <input  id="nombre" type="text" v-model="nombre" placeholder="Nombre de la categoría" class="validate">
                            <label class="activate" for="nombre"></label>

                        <br>  -->
                            <!-- select Características -->                        
                        <!-- <select name="LeaveType" class="browser-default" v-model="idCaracteristica">
                            <option value="" disabled selected>Selecciona las Características</option>
                            <option  v-on:change="(event) => console.log(event)" v-for="cara in arrayCaracteristicas" :value="cate.idCategorias" :key="cara.idCaracteristicas">{{ cara.nombre }}</option>
                            
                        </select> 
                        <br>
                
                    </div>
                </div>
                <div v-show="errorCategoria" class="form-group row div-error">
                    <div class="text-center text-error">
                        <div v-for="error in errorMostrarMsjCategoria" :key="error" v-text="error">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class=" espacioButton waves-effect waves-light btn " v-if="tipoAccion==1"  @click="nuevaCategoria()">Guardar</a>
                    <a class=" espacioButton waves-effect waves-light btn " v-if="tipoAccion==2"  @click="actualizarCategoria(idCategoria)">Actualizar</a>
                    <button type="button" class=" espacioButton btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                </div>
            </div>
         </div> -->
       <!-- Termina modal  agregar/actualizar Categoria-->

    <!-- abre modal -->
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg " role="document">
                <div class = "container">
                    <br>
                    <div class="center">
                        <h3 v-text="tituloModal"></h3>
                    </div>
                   
                    <div class="form-group row">
                        <!-- input para el nombre del producto --> 
                        <input id="nombre" type="text" v-model="Nombre" placeholder="Nombre Producto"  class="validate" >
                        <!-- <label  for="nombre">Nombre</label> -->
                        <br>  
                        <!-- select Subcategorias --> 
                        <select name="LeaveType" class="browser-default" v-model="idCate">
                            <option value="" disabled selected>Selecciona la Categoria</option>
                            <option v-on:change="(event) => console.log(event)" v-for="categoria in arrayCategoria" :value="categoria.idSubCategorias" :key="categoria.idCate">{{ categoria.Nombre }}</option>
                        <label>Seleccione la SubCategoría</label>
                        </select> 
                        <br>
                    </div> 
                    <div v-show="errorProducto" class="form-group row div-error">
                        <div class="text-center text-error">
                            <div v-for="error in errorMostrarMsjProducto" :key="error" v-text="error">
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
    <!-- cierra modal -->

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
                 <table>
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody v-for="categoria in arrayCategoria" :key="categoria.idCategoria">
                    <tr>
                        <td v-text="categoria.nombre"></td>
                        <td v-text="categoria.status"></td>
                    </tr>
                    </tbody>
                </table>
                <!-- <ul class="collection with-header" >
                   <li class="collection-header"><h4>Categorías</h4></li>
                    <li class="collection-item avatar">
                        <p v-text="categoria.nombre"></p>
                        <p>Categoría: {{ categoria.nombre }}</p>
                        <a class="secondary-content" v-if="categoria.Status == 1">
                            <i class="switch">
                                <label><input type="checkbox" checked="checked" name="status" v-model="categoria.status" @click="desactivarCategoria(categoria.idCategoria)"><span class="lever"></span></label>
                            </i>
                            <i class="material-icons brown-text " @click="abrirModal('Categoria','actualizar',categoria)">create</i>
                        </a>
                        <a class="secondary-content" v-if="categoria.status == 0">
                            <i class="switch">
                                <label><input type="checkbox"  name="status" v-model="categoria.status" @click="activarCategoria(categoria.idCategoria)"><span class="lever"></span></label>
                            </i> -->
                        <!-- </a>  
                         <a class="secondary-content"> -->
                            <!-- <i class="material-icons brown-text " @click="abrirModal('Categoria','actualizar',categoria)">create</i>
                        </a>                      
                    </li>
                </ul> -->
            </div>
                
        </div>
       <!-- Termina mostrar Categoria -->
    
    </main>
</template>

<script>

    export default {
        data(){
            return{
                idCategoria: 0,
                nombre: '',
                status : true,
                arrayCategoria:[],
                idCaracteristica: 0,
                arrayCaracteristicas: [],
                modal : 0,
                tituloModal : 'Registrar Categorias' ,
                cambio : 0,
                tipoAccion: 0,
                errorCategoria : 0,
                errorMostrarMsjCategoria : []
            }
        },
        methods: {
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
            nuevaCategoria() {
                if (this.validarCategoria()){
                    return;
                }
                let me = this;
                //Validamos si la informacion modificada es correcta
                // me.$validator.validateAll('new').then(valid => {
                //     if (valid) {
                let formData = new FormData();
                // formData.append('idCate', me.idCate);
                formData.append('nombre', me.nombre);
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
                var url= '/categoria';
                axios.get(url).then(function (response) {
                    var arrayCategorias= response.data;
                    me.arrayCategorias = arrayCategorias.map(object => ({idCategoria: object.idCategoria, Nombre: object.Nombre})); 
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
            },
            abrirModal(modelo,accion, data = []){
                switch(modelo){
                    case "Categoria":{
                        switch(accion){
                            case 'registrar':
                                {
                                    this.modal = 1;
                                    this.nombre = '';
                                    this.status = '';
                                    this.tipoAccion = 1;
                                    this.tituloModal = 'Registrar Categoria';
                                    break;
                                }
                            case 'actualizar':
                                {
                                    this.modal = 1;
                                    this.tipoAccion = 2;
                                    this.idCategoria = data['idCategoria'];
                                    this.nombre = data['nombre'];
                                    // this.idCategoria= data['idCategoria'];
                                    this.tituloModal = 'Actualizar Categoría';
                                    break;
                                }
                        }
                    }
                }
            },
            actualizarCategoria(idCategoria){
                let me = this;
                let formData = new FormData();
                formData.append('nombre', me.nombre);
                formData.append('idCategoria',idCategoria);
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
                if (!this.Nombre) this.errorMostrarMsjCategoria.push("El nombre de la Categoría no puede estar vacío.");
                if(!isNaN(this.NombreSub))this.errorMostrarMsjCategoria.push("El nombre de la Categoría no puede ser numérico.");
                if (this.errorMostrarMsjCategoria.length) this.errorCategoria = 1;
                return this.errorCategoria;
            }
        },mounted(){
            this.listarCategoria();
            // this.verSelects();
          
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
