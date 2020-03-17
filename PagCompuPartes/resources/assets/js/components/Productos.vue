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
                        <img v-if="tipoAccion==2" :src="'img/'+img"  class="imagenEdit" alt="">
                    </div>
                    <div class="form-group row">
                        <!-- input para el nombre del producto --> 
                        <input id="nombre" type="text" v-model="Nombre" placeholder="Nombre Producto"  class="validate" >
                        <!-- <label  for="nombre">Nombre</label> -->
                        <br>  
                        <!-- input para la descripción del producto-->
                        <input id="descripcion" type="text" v-model="Descripcion" placeholder="Descripcion" class="validate">
                        <!-- <label  for="descripcion"></label> -->
                        <br> 
                        <!-- select Subcategorias --> 
                        <select name="LeaveType" class="browser-default" v-model="idCate">
                            <option value="" disabled selected>Selecciona la Categoria</option>
                            <option v-on:change="(event) => console.log(event)" v-for="categoria in arrayCategoria" :value="categoria.idSubCategorias" :key="categoria.idCate">{{ categoria.Nombre }}</option>
                        <label>Seleccione la SubCategoría</label>
                        </select> 
                        <br>
                        <!-- input para la imagen del producto --> 
                        <div class="col s10 center" v-if="tipoAccion==1" >
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
                        <button type="button" v-if="tipoAccion==2" class="espacioButton waves-effect waves-light btn color" @click="actualizarProducto(idProducto)">Actualizar</button>
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
                    <a class="waves-effect waves-light btn right color" @click="abrirModal('productos','registrar')"><i class="material-icons left">add</i>Registrar Productos</a>
                    </div>
            </div>
        </div>
    <!-- fin boton abrir modal -->
    
       <div class="row">
               <div class="center col s12  l12">
                    <ul class="collection " v-for="producto in arrayProducto" :key="producto.idProducto">
                        <li class="collection-item avatar">
                        <img :src="'img/'+producto.Imagen" class="circle">

                            <h5 v-text="producto.Nombre"></h5>
                            <h6>Descripción: </h6>
                            <h6 v-text="producto.Descripcion"></h6>
                            <a href="#!" class="secondary-content" v-if="producto.Status == 1">
                                <i class="switch">
                                    <label><input type="checkbox" checked="checked" name="status" v-model="producto.Status" @click="desactivarProducto(producto.idProducto)"><span class="lever"></span></label>
                                </i>
                                      <i class="material-icons brown-text " @click="abrirModal('productos','actualizar',producto,producto.idProducto)">create</i>

                            </a>
                            <a href="#!" class="secondary-content" v-if="producto.Status == 0">
                                <i class="switch">
                                    <label><input type="checkbox"  name="status" v-model="producto.Status" @click="activarProducto(producto.idProducto)"><span class="lever"></span></label>
                                </i>
                                    <i class="material-icons brown-text " @click="abrirModal('productos','actualizar',producto,producto.idProducto)">create</i>
                            </a>
                        </li>
                    </ul>
           </div> 
        </div> 

    </main>
</template>
    <script>
    // import Swal from 'sweetalert2';
    // import Multiselect from 'vue-multiselect'

    
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
    export default {
        data(){
            return{
                idProducto: 0,
                idCate:'',
                img: '',
                Nombre: '',
                Descripcion:'',
                status : true,
                tipoAccion:0,
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
                var url = '/selectProductos'
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
                                this.Nombre = '';
                                this.Descripcion = '';
                                this.img= 'Selecciona imagen';
                                this.arrayCategoria= 'Selecciona la categoria';
                                this.tipoAccion = 1;
                                this.tituloModal = 'Registrar Producto';
                                break;

                            }
                            case 'actualizar':{
                                this.modal = 2;
                                this.idProducto = data['idProducto'];
                                this.tipoAccion = 2;
                                this.img=data['Imagen'];
                                this.Nombre=data['Nombre'];
                                this.Descripcion=data['Descripcion'];
                                this.tituloModal = 'Actualizar Producto';
                                this.idCate=data['idSubCate'];
                                var urld= '/producto_color?id='+id;
                                axios.get(urld).then(function (response) {
                                    console.log('estoy asignando los datos al array');
                                    m.arrayIdColor = response.data;
                                })
                                .catch(function (error) {
                                    console.log(error);
                                });

                                var urld= '/producto_talla?id='+id;
                                axios.get(urld).then(function (response) {
                                    m.arrayIdTalla = response.data;
                                })
                                .catch(function (error) {
                                    console.log(error);
                                });

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
                formData.append('Nombre', me.Nombre);
                formData.append('Descripcion', me.Descripcion);
                
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
                formData.append('Nombre', me.Nombre);
                formData.append('Descripcion', me.Descripcion);

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
                this.Nombre= "";
                this.Descripcion="";
                this.idCate="";
                this.tipoAccion = 0;
                this.errorProducto= 0;
                this.errorMostrarMsjProducto = [];
            },
            limpiar(){
                let me = this;
                me.errors.clear('new');
                me.errors.clear('update');
                me.img = '';
                me.Descripcion='';
                me.Nombre='';
                me.idCate='';
            },
            verSelects(){
                let me=this;
                me.listado=2;
                //Obtener los datos del ingreso de sub categorias
                var url= '/categoria';
                axios.get(url).then(function (response) {
                    var arrayCategoria= response.data;
                    me.arrayCategoria = arrayCategoria.map(object => ({idCate: object.idCate, NombreSub: object.Nombre})); 
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

                        axios.put('/productos/desactivar',{
                            'id': id
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
                        'id': id
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
                if (!this.Nombre) this.errorMostrarMsjProducto.push("El nombre del Producto no puede estar vacío.");
                if (!this.Descripcion) this.errorMostrarMsjProducto.push("La descripción del Producto no puede estar vacía.");
                

                if(!isNaN(this.Nombre))this.errorMostrarMsjProducto.push("El nombre del producto no puede ser numérico.");
                if(!isNaN(this.Descripcion))this.errorMostrarMsjProducto.push("La descripción del producto no puede ser numérico.");

                if (this.errorMostrarMsjProducto.length) this.errorProducto = 1;

                return this.errorProducto;
            },
            updateSelected: function (newSelected) {
                this.selected = newSelected
            },
            addTag (newTag) {
                this.idColor.push(tag);
                this.idTalla.push(tag);
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




