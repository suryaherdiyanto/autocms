import { createApp, h, DefineComponent } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import AButton from '@/Components/AButton.vue';
import ABox from '@/Components/ABox.vue';
import APanel from '@/Components/APanel.vue';
import ATable from '@/Components/ATable.vue';
import AInput from '@/Components/Form/AInput.vue';
import ATextarea from '@/Components/Form/ATextarea.vue';
import ARadioGroup from '@/Components/Form/ARadioGroup.vue';
import ACheckbox from '@/Components/Form/ACheckbox.vue';
import ACheckboxGroup from '@/Components/Form/ACheckboxGroup.vue';
import ASelect from '@/Components/Form/ASelect.vue';
import AEditor from '@/Components/Form/AEditor.vue';
import ARow from '@/Components/ARow.vue';
import AAlert from '@/Components/AAlert.vue';

import { Notification, MessageBox } from "@/plugins";

createInertiaApp({
    id: 'app',
    resolve: (name: string) => {
      return resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob<DefineComponent>('./Pages/**/*.vue'));
    },
    setup({ el, App, props, plugin }) {
      createApp({ render: () => h(App, props) })
        .use(plugin)
        .use(Notification)
        .use(MessageBox)
        .component('AButton', AButton)
        .component('ABox', ABox)
        .component('APanel', APanel)
        .component('ATable', ATable)
        .component('AInput', AInput)
        .component('ATextarea', ATextarea)
        .component('ARadioGroup', ARadioGroup)
        .component('ACheckbox', ACheckbox)
        .component('ACheckboxGroup', ACheckboxGroup)
        .component('ASelect', ASelect)
        .component('AEditor', AEditor)
        .component('ARow', ARow)
        .component('AAlert', AAlert)
        .component('MessageBox', MessageBox)
        .mount(el)
    },
  })
