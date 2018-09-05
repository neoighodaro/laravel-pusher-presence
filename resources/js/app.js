require('./bootstrap');
require('axios');

window.Vue = require('vue');

Vue.component('updates', require('./components/Updates.vue'));
Vue.component('suggestions', require('./components/Suggestions.vue'));
Vue.component('onlinelist', require('./components/OnlineList.vue'));

const app = new Vue({
    el: '#app'
});
