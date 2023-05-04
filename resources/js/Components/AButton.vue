<script setup lang="ts">
import { reactive, defineProps } from 'vue';
import ButtonLoadingSpinner from './Button/ButtonLoadingSpinner.vue';

const props = defineProps({
    loading: Boolean
});

let styles = reactive({'pointer-events-none': props.loading});
</script>

<template>
    <a :class="styles" class="bg-primary py-1.5 px-2 rounded text-gray-200 text-xs font-semibold cursor-pointer hover:bg-primary-lighter">
        <slot v-if="!loading"></slot>
        <slot v-if="loading" name="loading">
            <span>Loading...</span> <button-loading-spinner v-if="loading"></button-loading-spinner>
        </slot>
    </a>
</template>