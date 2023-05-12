<script setup lang="ts">
import { computed, defineProps, withDefaults, defineEmits } from "vue";

interface Props {
    name: string,
    label: string,
    placeholder: string,
    modelValue: string,
    errorMessage: string
}

const props = withDefaults(defineProps<Props>(), {
    errorMessage: null
});
const emit = defineEmits<{(e: 'update:modelValue', value: string): void}>();

const value = computed({
    set(value: string) {
        emit('update:modelValue', value);
    },
    get() {
        return props.modelValue;
    }
});

</script>

<template>
    <div class="block mb-2">
        <label :for="name" class="text-sm font-bold font-cairo">{{ label }}</label>
        <textarea v-model="value" :id="name" :placeholder="placeholder" :class="{'border-gray-400': !errorMessage, 'border-red-400': errorMessage}" class="w-full h-24 border rounded outline-none px-1 text-sm focus:ring-accent-primary focus:border-accent-primary"></textarea>
        <span v-if="errorMessage" class="text-sm text-red-400 font-semibold">{{ errorMessage }}</span>
    </div>
</template>