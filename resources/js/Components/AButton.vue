<template>
    <a :class="{'pointer-events-none': loading, 'bg-primary-lighter': loading}" class="py-1.5 px-2 rounded bg-primary text-gray-200 text-xs font-semibold hover:bg-primary-lighter">
        <slot v-if="!loading"></slot>
        <slot v-if="loading" name="loading">
            <span>Loading...</span> <button-loading-spinner v-if="loading"></button-loading-spinner>
        </slot>
    </a>
</template>

<script>
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
    setup() {

    },
}
</script>