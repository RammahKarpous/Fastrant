require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('image-selector', require('./components/ImageSelector.vue').default);


const app = new Vue({
    el: '#app',
});

import Quill from 'quill';

let toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],
    ['blockquote', 'code-block'],

    [{'color': [
            "#000000", "#e60000", "#ff9900", "#ffff00", "#008a00", "#0066cc", "#9933ff", "#ffffff", "#facccc", "#ffebcc",
            "#ffffcc", "#cce8cc", "#cce0f5", "#ebd6ff", "#bbbbbb", "#f06666", "#ffc266", "#ffff66", "#66b966", "#66a3e0",
            "#c285ff", "#888888", "#a10000", "#b26b00", "#b2b200", "#006100", "#0047b2", "#6b24b2", "#444444", "#5c0000",
            "#663d00", "#666600", "#003700", "#002966", "#3d1466", 'custom-color']},

        {'background': []}],

    [{'header': [1, 2, 3, 4, 5, 6, false]}],
    ['link']
];

let editor = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: toolbarOptions,
        syntax: false
    }
});
