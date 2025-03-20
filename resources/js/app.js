import './bootstrap';
import '../css/app.css';

import { createApp, h as renderComponent } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

// import AppFullLayout from '@/Layouts/FullLayout.vue'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (path) => resolvePageComponent(
        `./Pages/${path}.vue`,
        import.meta.glob('./Pages/**/*.vue')
    ),
    setup({ el, App, props, plugin }) {

        // console.log(arguments)

        // if (props.initialPage) {

        // }

        // props.initialComponent.layout = AppFullLayout

        return createApp({ render: () => renderComponent(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
        showSpinner: true
    },
})
