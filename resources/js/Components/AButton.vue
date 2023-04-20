<template>
    <a :class="styles" class="py-1.5 px-2 rounded text-gray-200 text-xs font-semibold cursor-pointer hover:bg-primary-lighter">
        <slot v-if="!loading"></slot>
        <slot v-if="loading" name="loading">
            <span>Loading...</span> <button-loading-spinner v-if="loading"></button-loading-spinner>
        </slot>
    </a>
</template>

<script>
import { reactive, ReactiveEffect } from 'vue';
import ButtonLoadingSpinner from './Button/ButtonLoadingSpinner.vue';

export default {
    props: {
        loading: {
            type: Boolean,
            default: false
        }
    },
    components: {
        ButtonLoadingSpinner
    },
    setup(props) {
        let styles = reactive({'pointer-events-none': props.loading, 'bg-primary-lighter': props.loading, 'bg-primary': !props.loading});

        return { styles }
    },
}
</script>