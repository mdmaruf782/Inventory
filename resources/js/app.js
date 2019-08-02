
require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//import route
import { routes } from './routes';



//import user class
import User from './helpers/User';
window.User = User

//import sweetalert
import Swal from 'sweetalert2'
window.Swal = Swal

//import noty notification

import Notification from './helpers/Notification'
window.Notification = Notification
 
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.Toast = Toast
//end sweetalert toast

const router = new VueRouter({
  routes,
  mode: 'history'
});

const app = new Vue({
  el: '#app',
  router,
});
