import { createWebHistory, createRouter } from "vue-router"
import Servers from "~/components/Servers/Main.vue"
import Settings from "~/components/Settings/Main.vue"

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            component: Servers,
            name: "Servers index",
            path: "/",
        },
        {
            component: Settings,
            name: "Settings",
            path: "/settings",
        },
    ],
});

export default router