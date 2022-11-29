import './bootstrap';
import {createApp} from 'vue';
import { createStore } from 'vuex'
import Index from './Components/Index.vue'
import router from './router/index.js';
import s from './store.js'

const store = createStore(s);

createApp({
    components: {
        Index
    },
    beforeCreate() {
        this.$store.dispatch("getFromLocalStorage");
        axios.get('/sanctum/csrf-cookie').then(response => {});
        axios.post('/login', {
            'email': "vincenzo66@example.org",
            'password': "password",
        }).then(response => {});

        axios.get('/api/user', {
            Accept: "application/json"
        }).then(response => {
            console.log("-----------------1", response.data);
        }).catch(error => {
            console.log("-----------------2", error);
        })
    }
}).use(router).use(store).mount("#app");
