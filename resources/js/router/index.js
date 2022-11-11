import App from '../Components/App.vue';
import About from '../Components/About.vue';
import { createRouter,createWebHistory} from 'vue-router'

const routes = [
    {
        'path': '/',
        'component': App,
        'name': 'main'
    },
    {
        'path': '/about',
        'component': About,
        'name': "about"
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

export default router
