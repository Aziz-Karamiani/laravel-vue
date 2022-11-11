import './bootstrap';
import {createApp} from 'vue';
import Index from './Components/Index.vue'
import router from './router/index.js';

createApp({
    components: {
        Index
    }
}).use(router).mount("#app");
