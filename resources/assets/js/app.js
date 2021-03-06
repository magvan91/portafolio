
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//Front
import Profile from './components/ProfileComponent.vue';
Vue.component('profile', Profile);

import Skills from './components/SkillsComponent.vue';
Vue.component('skills', Skills);

import Jobs from './components/JobsComponent.vue';
Vue.component('jobs', Jobs);

import Formcontact from './components/FormContactComponent.vue';
Vue.component('formcontact', Formcontact);

//Vue.component('profile-component', require('./components/ProfileComponent.vue'));
//Vue.component('skills-component', require('./components/SkillsComponent.vue'));
//Vue.component('jobs-component', require('./components/JobsComponent.vue'));

//CMS
//Vue.component('profileCrud-component', require('./components/CrudProfileComponent.vue'));
import Profilecrud from './components/CrudProfileComponent.vue';
Vue.component('profileCrud',Profilecrud);

import Skillscrud from './components/CrudSkillsComponents.vue';
Vue.component('skillsCrud',Skillscrud);

import SequentialEntrance from "vue-sequential-entrance";
import "vue-sequential-entrance/vue-sequential-entrance.css";
Vue.use(SequentialEntrance);

import DatePicker from 'vue2-datepicker'
Vue.use(DatePicker);

const app = new Vue({
    el: '#app',
    components: {
        Profile,
        Skills,
        Jobs,
        Profilecrud,
        Skillscrud,
        Formcontact
    }
});
