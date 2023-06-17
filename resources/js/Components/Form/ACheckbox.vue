<script setup lang="ts">
import { computed, defineProps, defineEmits } from "vue";

interface Props {
    label: string,
    modelValue: boolean,
    name: string
}
const props = defineProps<Props>();
const emit = defineEmits<{
    (e: 'update:modelValue', value: boolean): void
}>();

const value = computed({
    get() {
        return props.modelValue;
    },
    set(value) {
        emit('update:modelValue', value);
    }
});
</script>
<template>
    <input v-model="value" class="inline-block rounded-sm border-gray-400 text-accent-primary mr-2 focus:outline-accent-primary" :id="name" type="checkbox"> <label class="text-sm font-semibold mr-2" :for="name">{{ label }}</label>
</template>