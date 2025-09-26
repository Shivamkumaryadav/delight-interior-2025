import "./bootstrap";
import "../css/app.css";
import "summernote/dist/summernote-lite.css";

import VueSplide from "@splidejs/vue-splide";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";

import AdminLayout from "./Pages/Layouts/AdminLayout.vue";
import AppLayout from "./Pages/Layouts/AppLayout.vue";

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue"); // dynamic imports

        // Lazy load only when needed (code splitting)
        const module = await pages[`./Pages/${name}.vue`]();

        const page = module.default;

        // Allow page to define its own layout
        // If not set, apply default (AdminLayout / AppLayout)
        if (!page.layout) {
            page.layout =  name.startsWith("Auth/") ? '' :  name.startsWith("Admin/") ? AdminLayout : AppLayout;
        }

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(VueSplide)
            .mount(el);
    },
});
