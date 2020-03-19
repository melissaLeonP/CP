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
                     <input id="passwordConfirm" type="password"  class="validate" >
                     <label  for="passwordConfirm">Confirmar contraseña</label>
                 </div>
            </div>
            <br>
            <div class="botonContraseña">
                <a class="waves-effect btn-large color " @click="nuevaContra">Actualizar</a>
            </div>
        </div>

                

</template>
<script>

    export default {
        data(){
            return{
                email: '',
                status : true,
                password: '',
                passwordConfirm:'',
                errorContra : 0,
                errorContra: []
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
                me.errorContra = [];
            },
            nuevaContra() {
                if (this.validarContra()){
                    return;
                }
                let me = this;
                //Validamos si la informacion modificada es correcta
                // me.$validator.validateAll('new').then(valid => {
                //     if (valid) {
                let formData = new FormData();
                // formData.append('idCate', me.idCate);
                formData.append('email', me.email);
                formData.append('password', me.password);

                //Registramos la informacion
                axios.post('/password/registrar', formData, {
                    
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function (response) {
                    me.limpiar();
                    // me.listarCategoria();
                })
                .catch(function (error) {
                    console.log(error);
                });
            
            },
             validarContra(){
                this.errorContra=0;
                this.errorMostrarMsjContra =[];
                if(this.password.length < 5 ) this.errorContra = 'La contraseña debe de tener más de 5 carácteres';
                if (this.errorMostrarMsjContra.length) this.errorContra = 1;
                return this.errorContra;
            }
        },mounted(){
            // this.listarCategoria();
            // this.verSelects();
          
        }
    };
</script>