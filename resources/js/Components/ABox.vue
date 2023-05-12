<script setup lang="ts">
import { reactive, defineProps, withDefaults } from 'vue';

interface Box {
    isPanel: boolean
}

const props = withDefaults(defineProps<Box>(), {
    isPanel: false
});

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