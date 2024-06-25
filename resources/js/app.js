import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp , Head ,Link } from '@inertiajs/vue3'; //same for link on line 19
import {ZiggyVue} from '../../vendor/tightenco/ziggy'; //import from composer require tightenco/ziggy and add setup
import Layout from "./Layouts/Layout.vue";


createInertiaApp({
  title:(title) => `My App  ${title}`,
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    let page = pages[`./Pages/${name}.vue`];
    page.default.layout = page.default.layout|| Layout;
    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .component('Head',Head) //this will shorten code to removing script setup import {Head} from '@inertia/vue3' this will point at the head tag
      .component('Link',Link) //this will shorten code to removing script setup import {Link} from '@inertia/vue3' this will point at the head tag
      .mount(el)
  },
     progress: {
      // The delay after which the progress bar will appear, in milliseconds...
     // delay: 250,
  
      // The color of the progress bar...
      color: 'red',
  
      // Whether to include the default NProgress styles...
      includeCSS: true,
  
      // Whether the NProgress spinner will be shown...
      showSpinner: true,
    },
    // ...
  
})