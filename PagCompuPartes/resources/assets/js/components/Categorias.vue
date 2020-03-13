<template>
    <main class="main">
        
        <!-- Inicia modal agregar/actualizar Categoria -->
    
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="container">
                    <h3 v-text="tituloModal"></h3>
                    <div class="input-field ">
                            <!-- input para el nombre de la Categoria -->
                        
                        <input  id="nombre" type="text" v-model="Nombre" placeholder="Nombre Categoria" class="validate">
                            <label class="activate" for="nombre"></label>

                        <br> 
                            <!-- select Características -->                        
                        <select name="LeaveType" class="browser-default" v-model="idCaracteristica">
                            <option value="" disabled selected>Selecciona las Características</option>
                            <option  v-on:change="(event) => console.log(event)" v-for="cara in arrayCaracteristicas" :value="cate.idCategorias" :key="cara.idCaracteristicas">{{ cara.Nombre }}</option>
                            
                        </select> 
                        <br>
                
                    </div>
                </div>
                <div v-show="errorCategoria" class="form-group row div-error">
                    <div class="text-center text-error">
                        <div v-for="error in errorMostrarMsjCaractegoria" :key="error" v-text="error">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class=" espacioButton waves-effect waves-light btn deep-orange lighten-4 brown-text" v-if="tipoAccion==1"  @click="nuevaCategoria()">Guardar</a>
                    <a class=" espacioButton waves-effect waves-light btn deep-orange lighten-4 brown-text" v-if="tipoAccion==2"  @click="actualizarCategoria(idCategoria)">Actualizar</a>
                    <button type="button" class=" espacioButton btn btn-secondary deep-orange lighten-4 brown-text" @click="cerrarModal()">Cerrar</button>
                </div>
            </div>
         </div>
       <!-- Termina modal  agregar/actualizar Categoria-->

       <!-- Mostrar Categoria -->

        <div class="row">
            <div class="col s12 l12">  
                <h3 class="center">Categorías</h3>  
                <div class="right col s2 l4">
                    <a class="btn-floating btn-large waves-effect waves-light deep-orange lighten-4 right" @click="abrirModal('Categoria','registrar')"><i class="brown-text material-icons">add</i></a>
                </div>
            </div>
        </div>
               
        <div class="row">
                <ul class="collection col s12 l12" v-for="categoria in arrayCategoria" :key="categoria.idCategoria">
                    <li class="collection-item avatar">
                        <p v-text="categoria.Nombre"></p>
                        <p>Categoría: {{ categoria.Nombre }}</p>
                        <a class="secondary-content" v-if="categoria.Status == 1">
                            <i class="switch">
                                <label><input type="checkbox" checked="checked" name="status" v-model="categoria.Status" @click="desactivarCategoria(categoria.idCategoria)"><span class="lever"></span></label>
                            </i>
                            <i class="material-icons brown-text " @click="abrirModal('Categoria','actualizar',categoria)">create</i>
                        </a>
                        <a class="secondary-content" v-if="categoria.Status == 0">
                            <i class="switch">
                                <label><input type="checkbox"  name="status" v-model="categoria.Status" @click="activarCategoria(categoria.idCategoria)"><span class="lever"></span></label>
                            </i>
                        <!-- </a>  
                         <a class="secondary-content"> -->
                            <i class="material-icons brown-text " @click="abrirModal('Categoria','actualizar',categoria)">create</i>
                        </a>                      
                    </li>
                </ul>
        </div>
       <!-- Termina mostrar Categoria -->
    
    </main>
</template>

<script>

    export default {
        data(){
            return{
                idCategoria: 0,
                Nombre: '',
                status : true,
                arrayCategoria:[],
                arrayCaracteristica: [],
                modal : 0,
                tituloModal : 'Registrar Categorias' ,
                cambio : 0,
                tipoAccion: 0,
                errorCategoria : 0,
                errorMostrarMsjCategoria : [],
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
                me.Nombre= '';
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
                formData.append('Nombre', me.Nombre);
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
                this.Nombre="";
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
                                    this.Nombre = '';
                                    this.Status = '';
                                    this.tipoAccion = 1;
                                    this.tituloModal = 'Registrar Categoria';
                                    break;
                                }
                            case 'actualizar':
                                {
                                    this.modal = 1;
                                    this.tipoAccion = 2;
                                    this.idCategoria = data['idCategoria'];
                                    this.Nombre = data['Nombre'];
                                    this.idCategoria= data['idCategoria'];
                                    this.tituloModal = 'Actualizar Sub categoria';
                                    break;
                                }
                        }
                    }
                }
            },
            actualizarCategoria(idCategoria){
                let me = this;
                let formData = new FormData();
                formData.append('Nombre', me.Nombre);
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
    .mostrar{
        display: list-item !important;
        opacity: 1 !important; 
        position: absolute !important;
    }  
    .espacioButton{
        margin-left: 10px !important;
    }
</style>