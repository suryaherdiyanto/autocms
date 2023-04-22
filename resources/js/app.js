import './bootstrap';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import AButton from './Components/AButton.vue';
import ABox from './Components/ABox.vue';
import APanel from './Components/APanel.vue';
import ATable from './Components/ATable.vue';
import AInput from './Components/Form/AInput.vue';
import ATextarea from './Components/Form/ATextarea.vue';

createInertiaApp({
    id: 'app',
    resolve: name => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
      createApp({ render: () => h(App, props) })
        .use(plugin)
        .component('AButton', AButton)
        .component('ABox', ABox)
        .component('APanel', APanel)
        .component('ATable', ATable)
        .component('AInput', AInput)
        .component('ATextarea', ATextarea)
        .mount(el)
    },
  })
