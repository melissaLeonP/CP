<template>
    <main class="main">
         <!-- abre modal -->
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg " role="document">
                <div class = "container">
                    <br>
                    <div class="center">
                        <h3 v-text="tituloModal"></h3>
                    </div>
                    <div class="col s5 center">
                        <img v-if="tipoAccion==2" :src="'img/'+imagen"  class="imagenEdit" alt="">
                    </div>
                    <div class="form-group row">
                        <!-- input para el nombre del producto --> 
                        <input id="nombre" type="text" v-model="nombre" placeholder="Nombre Producto"  class="validate" >
                        <!-- <label  for="nombre">Nombre</label> -->
                        <br>  
                        <!-- input para la descripción del producto-->
                        <input id="descripcion" type="text" v-model="descripcion" placeholder="Descripcion" class="validate">
                        <!-- <label  for="descripcion"></label> -->
                        <br> 
                        <!-- select Subcategorias --> 
                        <select name="LeaveType" class="browser-default" v-model="idCate">
                            <option value="" disabled selected>Selecciona la categoría</option>
                            <option   v-for="cate in arrayCategoria" :value="cate.idCategoria"  :key="cate.idCategoria">{{ cate.nombre }}</option>
                            
                        </select> 
                        <br>
                        <!-- input para la imagen del producto --> 
                        <div class="col s10 center">
                            <div class="file-field input-field">
                                <div class="waves-effect waves-light btn color">
                                    <span>Imagen</span>
                                    <input id="file" ref="filea"  type="file" data-vv-scope="new"  v-on:change="seleccionarImagen(1)" class="productoAlta">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div> 
                    </div> 
                    <div v-show="errorProducto" class="form-group row div-error">
                        <div class="text-center text-error">
                            <div v-for="error in errorMostrarMsjProducto" :key="error" v-text="error">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" v-if="tipoAccion==1" class="espacioButton waves-effect waves-light btn color" @click="nuevoProducto()">Guardar</button>
                        <button type="button" v-if="tipoAccion==2" class="color espacioButton waves-effect waves-light btn" @click="actualizarProducto(idProducto)">Actualizar</button>
                        <button type="button" class="espacioButton waves-effect waves-light btn color" @click="cerrarModal()">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>  
    <!-- cierra modal -->

  <!-- boton abrir modal -->
        <div class="row">
            <div class="col s12 l12 ">
                <h3 class="center">Productos</h3>
                <div class="right col s2 l4">
                    <a class="waves-effect waves-light btn right color" @click="abrirModal('productos','registrar')"><i class="material-icons left">add</i>Nuevo Productos</a>
                </div>
            </div>
        </div>
    <!-- fin boton abrir modal -->
    <!-- tabla de productos -->
        <div class="row tablaProductos">
            <div class="col s2 m10 l10 centro">
                 <table class="centered">
                    <thead>
                    <tr>
                        <th>imagen</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Status</th>
                        <th>Editar</th>
                        <th>Desactivar/Activar</th>
                    </tr>
                    </thead>
                    <tbody  v-for="producto in arrayProducto" :key="producto.idProducto">
                        <tr>
                            <td ><img :src="'img/'+producto.imagen" class="circle"></td>
                            <td v-text="producto.nombre"></td>
                            <td v-text="producto.descripcion"></td>
                            <td v-if="producto.status == 1">Activado</td>
                            <td v-if="producto.status == 0">Desactivado</td>
                            <td>
                                <i class="material-icons color-text " @click="abrirModal('productos','actualizar',producto,producto.idProducto)">create</i>
                            </td>
                            <td >
                                <a href="#!" class="secondary-content" v-if="producto.status == 1">
                                    <i class="switch">
                                        <label><input type="checkbox" checked="checked" name="status" v-model="producto.status" @click="desactivarProducto(producto.idProducto)"><span class="lever"></span></label>
                                    </i>
                                </a>
                                <a href="#!" class="secondary-content" v-if="producto.status == 0">
                                    <i class="switch">
                                        <label><input type="checkbox"  name="status" v-model="producto.status" @click="activarProducto(producto.idProducto)"><span class="lever"></span></label>
                                    </i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>  
        </div>
        <!-- fin de la tabla de productos -->
    </main>
</template>
    <script>
    import Swal from 'sweetalert2';
    // import Multiselect from 'vue-multiselect'

    
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
    export default {
        data(){
            return{
                idProducto: 0,
                idCate: '',
                imagen: '',
                nombre: '',
                descripcion:'',
                status : true,
                tipoAccion: 0,
                arrayProducto:[],
                arrayCategoria:[],
                modal : 0,
                errorProducto : 0,
                errorMostrarMsjProducto: [],
                tituloModal : '',
                file:'',
            }
        },methods:{
            listarProductos(){
                let me=this;
                var url = '/productos'
                axios.get(url).then(function (response){
                    me.arrayProducto = response.data;
                    me.status = response.status.data;
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
            abrirModal(modelo,accion, data = [],id){
                let m=this;
                switch(modelo){
                    case "productos":{
                        switch(accion){
                            case 'registrar':{
                                this.modal = 1;
                                this.nombre = '';
                                this.descripcion = '';
                                this.imagen= 'Selecciona imagen';
                                // this.arrayCategoria= 'Selecciona la categoria';
                                this.tipoAccion = 1;
                                this.tituloModal = 'Registrar producto';
                                break;

                            }
                            case 'actualizar':{
                                this.modal = 2;
                                this.idProducto = data['idProducto'];
                                this.tipoAccion = 2;
                                this.imagen=data['imagen'];
                                this.nombre=data['nombre'];
                                this.idCate=data['idCategoria'];
                                this.descripcion=data['descripcion'];
                                this.tituloModal = 'Actualizar producto';
                                // this.idCate=data['idCate'];
                            }
                        }
                    }
                }
            },
            nuevoProducto(){
                if (this.validarProducto()){
                    return;
                }
                let me = this;

                let formData = new FormData();

                formData.append('file', me.file);
                formData.append('idCate', me.idCate);
                formData.append('nombre', me.nombre);
                formData.append('descripcion', me.descripcion);
                
                // Registramos la informacion
                axios.post('/productos/registrar', formData, {
                    
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        
                    }
                })
                .then(function (response) {
                    me.listarProductos();
                    me.cerrarModal();
                    me.limpiar();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            actualizarProducto(idProducto){
                
                let me = this;

                let formData = new FormData();
                
                formData.append('file', me.file);
                formData.append('idProducto',idProducto);
                formData.append('idCate', me.idCate);
                formData.append('nombre', me.nombre);
                formData.append('descripcion', me.descripcion);

                // Regresamos la informacion
                axios.post('/productos/actualizar', formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function (response) {
                    me.listarProductos();
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
                this.nombre= "";
                this.descripcion="";
                this.idCate="";
                this.tipoAccion = 0;
                this.errorProducto= 0;
                this.errorMostrarMsjProducto = [];
            },
            limpiar(){
                let me = this;
                me.errors.clear('new');
                me.errors.clear('update');
                me.imagen = '';
                me.descripcion='';
                me.nombre='';
                me.idCate='';
            },
            verSelects(){
                let me=this;
                //Obtener los datos del ingreso de categorias
                var url= '/categoria';
                axios.get(url).then(function (response) {
                    var arrayCategoria= response.data;
                    me.arrayCategoria = arrayCategoria.map(object => ({idCategoria: object.idCategoria, nombre: object.nombre})); 
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            seleccionarImagen(img){
                if (img == 1) {            
                    this.file = this.$refs.filea.files[0];
                    readURL(document.getElementsByClassName("productoAlta")[0], 1);
                }
                else {
                    this.file = this.$refs.filec.files[0];
                    readURL(document.getElementsByClassName("productoEdit")[0], 2);
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
            desactivarProducto(id){
                let me = this;

                Swal.fire({
                title: '¿Está seguro de desactivar este producto?',
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

                        console.log('id de producto', id);
                        axios.put('/productos/desactivar',{
                            'idProducto': id
                        }).then(function (response) {
                            me.listarProductos();
                            Swal.fire(
                                'Desactivado!',
                                'el producto ha sido desactivado con éxito.',
                                'success'
                            )
                        }).catch(function (error) {
                            console.log(error);
                        });                    
                    } else if(
                            // Read more about handling dismissals
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            me.listarProductos();
                        
                    }
                    })
            },
            activarProducto(id){
                let me = this;

                Swal.fire({
                title: '¿Está seguro de activar este producto?',
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
                    axios.put('/productos/activar',{
                        'idProducto': id
                    }).then(function (response) {
                        me.listarProductos();
                        Swal.fire(
                            'activado!',
                            'El producto ha sido activado con éxito.',
                            'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });
                
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                            me.listarProductos();                    
                }
                }) 
                    
            },
            validarProducto(){
                this.errorProducto=0;
                this.errorMostrarMsjProducto =[];

                if (this.arrayCategoria==0) this.errorMostrarMsjProducto.push("Seleccione una Categoria.");
                if (!this.nombre) this.errorMostrarMsjProducto.push("El nombre del Producto no puede estar vacío.");
                if (!this.descripcion) this.errorMostrarMsjProducto.push("La descripción del Producto no puede estar vacía.");
                

                if(!isNaN(this.nombre))this.errorMostrarMsjProducto.push("El nombre del producto no puede ser numérico.");
                if(!isNaN(this.descripcion))this.errorMostrarMsjProducto.push("La descripción del producto no puede ser numérico.");

                if (this.errorMostrarMsjProducto.length) this.errorProducto = 1;

                return this.errorProducto;
            }
        },components: {
            // Multiselect
        },mounted(){
            this.listarProductos();
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




