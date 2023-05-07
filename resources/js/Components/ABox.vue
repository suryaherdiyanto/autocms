<script setup lang="ts">
import { reactive, defineProps } from 'vue';

interface Box {
    isPanel: Boolean
}

const props = defineProps<Box>();

const atts = reactive<Object>({
    'p-5': true,
});

if (props.isPanel) {
    atts['p-5'] = false;
}
</script>

<template>
    <div class="bg-white rounded-lg border border-gray-200 w-full" :class="atts">
        <slot></slot>
    </div>
</template>