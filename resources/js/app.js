import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

InertiaProgress.init()

createInertiaApp({
    resolve: name => import(`./Pages/${name}.vue`),
    setup({ el, App, props }) {
        return createApp({ render: () => h(App, props) })
            .mount(el)
    },
})
