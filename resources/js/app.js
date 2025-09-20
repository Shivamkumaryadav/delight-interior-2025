import './bootstrap';
import '../css/app.css';
import 'summernote/dist/summernote-lite.css'
import VueSplide from '@splidejs/vue-splide';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use( VueSplide )
      .mount(el)
  },
})
