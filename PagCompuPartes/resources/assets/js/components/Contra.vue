<template>
        <div class="row contraseñas">
                <h3 class="center">Cambio de contraseña</h3>  
                <br>
            <div class="col s12 m12 g12">
                 <div class="input-field">
                     <i class="material-icons prefix">email</i>
                     <input id="correo" type="text" v-model="email" class="validate" >
                     <label  for="correo">Correo</label>
                 </div>
                 <div class="input-field">
                     <i class="material-icons prefix">lock</i>
                     <input id="password" type="password" v-model="password" class="validate" >
                     <label  for="password">Contraseña</label>
                 </div>
                 <div class="input-field"> 
                     <i class="material-icons prefix">lock</i>
                     <input id="passwordConfirm" type="password" v-model="passwordConfirm" class="validate" >
                     <label  for="passwordConfirm">Confirmar contraseña</label>
                 </div>
            </div>
            <br>
            <div v-show="errorContra" class="form-group row div-error">
                        <div class="text-center text-error">
                            <div v-for="error in errorMostrarMsjContra" :key="error" v-text="error">
                            </div>
                        </div>
                    </div>
            <br>
            <div class="center">
                <a class="waves-effect btn color" @click="limpiar()">Limpiar</a>
                <a class="waves-effect btn color" @click="nuevaContra()">Actualizar</a>

            </div>
        </div>

                

</template>
<script>
import Swal from 'sweetalert2';

    export default {
        data(){
            return{
                email: '',
                status : true,
                password: '',
                passwordConfirm:'',
                errorContra : 0,
                errorMostrarMsjContra: []
            }
        },
        methods: {
            // listarCategoria(){
            //  let m=this;
            //  axios.get('/categoria').then(function (response){
            //         m.arrayCategoria = response.data;
            //         m.status = response.status.data;
            //         if(status == true){
            //             status = 1
            //         }else{
            //             status = 0
            //         }
                  
            //     })
            //     .catch(function(error){
            //         console.log(error);
            //     });
            // },
            limpiar() {
                let me = this;
                me.email='';
                // me.correo= '';
                me.password = '';
                me.passwordConfirm = '';
                me.status = true;
                // me.tipoAccion= 0;
                me.errorContra = 0;
                me.errorMostrarMsjContra = [];
            },
            nuevaContra() {
                if (this.validarContra()){
                    return;
                }
                let me = this;
                 Swal.fire({
                title: '¿Está seguro de actualizar la contraseña?',
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
 
                        let formData = new FormData();
                        // formData.append('idCate', me.idCate);
                        formData.append('email', me.email);
                        formData.append('password', me.password);

                        //Registramos la informacion
                        axios.post('/password/actualizar', formData, {
                            
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }).then(function (response) {
                            Swal.fire(
                                'Actualizada!',
                                'La contraseña ha sido actualizada con éxito.',
                                'success'
                            )
                          me.limpiar();
                        }).catch(function (error) {
                            console.log(error);
                        });                    
                    } else if  (
                            // Read more about handling dismissals
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                        //   me.limpiar();
                        
                    } 
                })
                //Validamos si la informacion modificada es correcta
                // me.$validator.validateAll('new').then(valid => {
                //     if (valid) {

                // let formData = new FormData();
                // formData.append('idCate', me.idCate);
                // formData.append('email', me.email);
                // formData.append('password', me.password);

                //Registramos la informacion
                // axios.post('/password/actualizar', formData, {
                    
                //     headers: {
                //         'Content-Type': 'multipart/form-data'
                //     }
                // })
                // .then(function (response) {
                //     me.limpiar();
                    // me.listarCategoria();
                // })
                // .catch(function (error) {
                //     console.log(error);
                // });
            
            },
             validarContra(){
                this.errorContra=0;
                this.errorMostrarMsjContra =[];
                if (!this.password) this.errorMostrarMsjContra.push("La contraseña no puede estar vacía.");
                if(this.password.length < 5 ) this.errorMostrarMsjContra.push('La contraseña debe de tener más de 5 carácteres');
                if(this.password != this.passwordConfirm)  this.errorMostrarMsjContra.push('Las contraseñas no coinciden');
                if (this.errorMostrarMsjContra.length) this.errorContra = 1;

                return this.errorContra;
            }
        },mounted(){
            // this.listarCategoria();
            // this.verSelects();
          
        }
    };
</script>