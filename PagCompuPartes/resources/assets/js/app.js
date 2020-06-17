/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Consola
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('slider-component', require('./components/Sliders.vue').default);
Vue.component('productos-component', require('./components/Productos.vue').default);
Vue.component('categorias-component', require('./components/Categorias.vue').default);
Vue.component('contraseña-component', require('./components/Contra.vue').default);

// Pagina principal
Vue.component('index-component', require('./principal/index.vue').default);
Vue.component('nosotros-component', require('./principal/nosotros.vue').default);
Vue.component('outlet-component', require('./principal/outlet.vue').default);
Vue.component('contacto-component', require('./principal/contacto.vue').default);
Vue.component('soluciones-component', require('./principal/soluciones.vue').default);
Vue.component('avisoprivacidad-component', require('./principal/avisoPrivacidad.vue').default);
Vue.component('productosprincipal-component', require('./principal/ProductosT.vue').default);
 

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data :{
        menu : 0,
        outletIdCate: 0
    },
    methods:{
        mostrarMenu(objeto){
            let m = this;
         m.menu = objeto.valorMenu;
         m.outletIdCate = objeto.valorId;
        }
    }
});
