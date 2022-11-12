import './bootstrap';
import '../css/app.css';
import '../css/main.css';

import { createApp, h, } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
///

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


/* add some free styles */
import * as faIcons from '@fortawesome/free-solid-svg-icons'
let icons = []
for (const key in faIcons) {
    try {
        if (Object.hasOwnProperty.call(faIcons, key) && faIcons[key]?.prefix == "fas") {
            icons.push(faIcons[key]);

        }

    } catch (error) {

    }
}

/* add each imported icon to the library */
library.add(...icons)


//
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Bytee Studio';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el);
    },
});



InertiaProgress.init({ color: '#783DEE' });
