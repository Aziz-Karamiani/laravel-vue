import './bootstrap';
import {createApp} from 'vue';
import App from './Components/App.vue';
import About from './Components/About.vue';
import router from './router/index.js';

createApp({
    components: {
        App,
        About
    }
}).use(router).mount("#app");
