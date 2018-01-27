
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});


//Função para enviar o link para o Modal de Exclusão
$(".btn-delete").on("click", function(){
    var href = $(this).data("href");
    var text = $(this).attr("text");
    if($("#myModal").length > 0){
        $("#btn-delete").attr("href",href);
        $(".modal-body").html(text);

    }
});
