<script setup lang="ts">
import { computed, defineProps, defineEmits } from "vue";

interface RadioOption {
    value: string,
    label: string
}
interface Props {
    label: string,
    name: string,
    options: Array<RadioOption>,
    modelValue: string
}

const props = defineProps<Props>();
const emit = defineEmits<{
    (e: 'update:modelValue', value: string|number): void
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
    <div class="flex flex-wrap flex-col mb-2">
        <label class="block text-sm font-bold font-cairo">{{ label }}</label>
        <div class="flex flex-wrap">
            <div v-for="(option, key) in options" :key="key">
                <input v-model="value" class="text-accent-primary focus:outline-accent-primary" type="radio" :name="name" :id="option.value" :value="option.value" :checked="value === option.value"> <label class="text-sm font-semibold mr-2" :for="option.value">{{ option.label }}</label>
            </div>
        </div>
    </div>
</template>