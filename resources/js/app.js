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

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('image-selector', require('./components/ImageSelector.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

// Selecting category image ==== CATEGORIES PAGE

// let catImage = document.querySelector('#category_image'),
//     imageSelector = document.querySelector('.image-selector');
//
// catImage.addEventListener('change', function () {
//     imageSelector.setAttribute('style', `background: url('${catImage.value}')`);
//
//     // console.log(catImage.value);
// });

function handleFiles(e) {
    let URL = window.webkitURL || window.URL;
    let max_width = 400;
    let max_height = 300;
    let ctx = document.getElementById('canvas').getContext('2d');
    let url = URL.createObjectURL(e.target.files[0]);
    let img = new Image();
    img.onload = function() {
        let ratio = 1;
        if (img.width > max_width) {
            ratio = max_width / img.width;
        }
        if (ratio * img.height > max_height) {
            ratio = max_height / img.height;
        }
        ctx.scale(ratio, ratio);
        ctx.drawImage(img, 0, 0);
    };
    img.src = url;
}

window.onload = function() {
    let input = document.getElementById('#category_image');
    input.addEventListener('change', handleFiles, false);
};
