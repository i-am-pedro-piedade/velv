import { createWebHistory, createRouter } from "vue-router"
import Home from "~/components/Home/Main.vue"
import Servers from "~/components/Servers/Main.vue"
import ServerDetail from "~/components/Servers/Detail.vue"
import Settings from "~/components/Settings/Main.vue"

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            component: Home,
            name: "Server management",
            path: "/"
        },
        {
            component: Servers,
            name: "Server index",
            path: "/servers",
        },
        {
            component: ServerDetail,
            name: "Server detail",
            path: "/server/:id",
        },
        {
            component: Settings,
            name: "Settings",
            path: "/settings",
        },
    ],
});

export default router