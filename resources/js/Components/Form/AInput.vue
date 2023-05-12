<script lang="ts">
enum InputTypes {
    TEXT = 'text',
    PASSWORD = 'password',
    NUMBER = 'number'
}
</script>
<script setup lang="ts">
import { withDefaults, computed } from 'vue';
import { Input } from 'postcss';

interface InputProps {
    label: string,
    name: string,
    errorMessage: string,
    type: InputTypes
    modelValue: string,
    placeholder: string
}

const props = withDefaults(defineProps<InputProps>(), {
    type: InputTypes.TEXT,
    errorMessage: null
});

const emit = defineEmits<{
    (e: 'update:modelValue', value: string): void
}>();

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
        <input v-model="value" :type="type" :placeholder="placeholder" name="first_name" :id="name" :class="{'border-gray-400': !errorMessage, 'border-red-400': errorMessage}" class="w-full h-8 border rounded px-1 text-sm font-semibold focus:ring-accent-primary focus:border-accent-primary active:border-accent-primary">
        <span v-if="errorMessage" class="text-sm text-red-400 font-semibold">{{ errorMessage }}</span>
    </div>
</template>