import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import Form from './utilities/Form';

window.Vue = Vue;
Vue.use(VueRouter);
window.axios = axios;

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};

window.Form = Form;

import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '2f97df267756327eb36a',
    cluster: 'eu',
    encrypted: true
});
