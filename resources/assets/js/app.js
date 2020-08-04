
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex';
Vue.use(Vuex);
;

// Vuex

const store = new Vuex.Store({
    state:{
      item:{}
    },
    mutations:{
      setItem(state,obj){
        state.item = obj;
      }
    }
  });


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('topo', require('./components/Topo.vue'));
Vue.component('pannel', require('./components/Pannel.vue'));
Vue.component('box', require('./components/Box.vue'));
Vue.component('page', require('./components/Page.vue'));
Vue.component('table-list', require('./components/TableList.vue'));
Vue.component('breadcrumbs', require('./components/Breadcrumb.vue'));
Vue.component('modal', require('./components/modal/Modal.vue'));
Vue.component('modallink', require('./components/modal/ModalLink.vue'));
Vue.component('formulary', require('./components/Formulary.vue'));
Vue.component('card-article', require('./components/CardArticle.vue'));
const app = new Vue({
    el: '#app',
    store,
    mounted: function(){
      document.getElementById('app').style.display = 'block';
    }
});
