require('./bootstrap');
import Vue from "vue";
window.Vue=require("vue");
Vue.component("inicio",require("./Consumo.vue").default);

const app = new Vue({
    el:"#app"
});