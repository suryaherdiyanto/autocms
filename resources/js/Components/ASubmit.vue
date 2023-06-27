<script setup lang="ts">
import { reactive, defineProps, withDefaults, computed } from 'vue';
import ButtonLoadingSpinner from './Button/ButtonLoadingSpinner.vue';

type ButtonType = 'primary' | 'light';

interface Props {
    loading?: boolean,
    type?: ButtonType
}

const props = withDefaults(defineProps<Props>(), {
    loading: false,
    type: 'primary'
});

let styles = reactive({'pointer-events-none': props.loading});
const buttonType = reactive({
    primary: {
        'text-gray-200': true,
        'bg-primary': true,
        'hover:bg-primary-lighter': true
    },
    light: {
        'text-gray-800': true,
        'bg-white': true,
        'border': true,
        'border-gray-200': true,
        'hover:bg-gray-200': true
    }
});

const buttonStyles = computed(() => {
    return {...styles, ...buttonType[props.type]}
});
</script>

<template>
    <button type="submit" :class="buttonStyles" class="py-1.5 px-2 rounded text-xs font-semibold cursor-pointer">
        <slot v-if="!loading"></slot>
        <slot v-if="loading" name="loading">
            <span>Loading...</span> <button-loading-spinner v-if="loading"></button-loading-spinner>
        </slot>
    </button>
</template>