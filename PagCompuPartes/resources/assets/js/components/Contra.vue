<template>
         <div class="col s12 center ">
             <div class="row">
                 <div class="col s7">
                     <input id="email" type="text" v-model="email" class="validate" >
                     <label  for="email">Correo</label>
                 </div>
                 <div class="col s7">
                     <input id="password" type="password" v-model="password" class="validate" >
                     <label  for="password">Contraseña</label>
                 </div>
                 <div class="col s7">
                     <input id="passwordConfirm" type="password"  class="validate" >
                     <label  for="passwordConfirm">Confirmar contraseña</label>
                 </div>
             </div>
             <div class="center col s2 l4 ">
                      <a class="waves-effect btn color right" @click="nuevaContra"><i class="material-icons left">lock_open</i>Cambiar contra</a>
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
                me.correo= '';
                me.password = '';
                me.passwordConfirm = '';
                me.status = true;
                me.tipoAccion= 0;
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
                //Registramos la informacion
                axios.post('/password/registrar', formData, {
                    
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
             validarContra(){
                this.errorContra=0;
                this.errorMostrarMsjContra =[];
                if (this.errorMostrarMsjContra.length) this.errorContra = 1;
                return this.errorContra;
            }
        },mounted(){
            // this.listarCategoria();
            // this.verSelects();
          
        }
    };
</script>