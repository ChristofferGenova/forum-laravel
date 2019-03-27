
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('materialize-css/dist/js/materialize.js');
    require('./parallax-header.js');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from "laravel-echo"
window.Pusher = require('pusher-js');
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '3c70f2783c294f25ac6e',
    cluster: 'eu',
    encrypted: false,
    host: window.location.hostname
});

import Swal from 'sweetalert2';
const successCallback = (response) => {
    return response;
};
const errorCallback = (error) => {
    if (error.response.status === 401) {
        Swal.fire({
            title: 'Autenticação',
            text: 'Para acessar este recurso você precisa estar autenticado!',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Não, obrigado.',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.value) {
                window.location = '/login';
            }
        });
    } else {
        Swal.fire({
            title: 'Erro Desconhecido',
            text: 'Algo deu errado, tente novamente mais tarde',
            type: 'error',
            showCancelButton: false,
            confirmButtonText: 'Ok'
        });
    }
    return Promise.reject(error);
};
window.axios.interceptors.response.use(successCallback, errorCallback);

import Vue from 'vue';
window.Vue = require('vue').default;
Vue.component('loader', require('./commons/AxiosLoader.vue').default);
const commonApps = new Vue({
    el: '#loader'
});


