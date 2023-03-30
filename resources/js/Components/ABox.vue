<template>
    <div class="bg-white rounded-lg border border-gray-200 w-full" :class="atts">
        <slot></slot>
    </div>
</template>

<script>
import { reactive } from 'vue';

export default {
    props: {
        isPanel: {
            type: Boolean,
            default: false
        },
    },
    setup(props) {
        const atts = reactive({
            'p-5': true,
        });

        if (props.isPanel) {
            atts['p-5'] = false;
        }

        return { atts };
    },
}
</script>