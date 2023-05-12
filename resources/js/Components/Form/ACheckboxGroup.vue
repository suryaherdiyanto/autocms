<script setup lang="ts">
import { defineProps, defineEmits, withDefaults, computed } from "vue";

interface CheckboxOption {
    value: string,
    label: string
}

interface Props {
    label: string,
    name: string,
    options: Array<CheckboxOption>,
    modelValue: Array<string|number>
}
const props = withDefaults(defineProps<Props>(), {
    modelValue: () => []
});
const emit = defineEmits<{
    (e: 'update:modelValue', value: Array<string|number>): void
}>();
const options = computed(() => {
    return props.options;
});
const value = computed(() => {
    return props.modelValue;
});

function onInputChange($event: Event) {
    const target = $event.target as HTMLInputElement;

    if (target.checked) {
        props.modelValue.push(target.value);
    } else {
        const removeIndex = props.modelValue.indexOf(target.value);
        props.modelValue.splice(removeIndex, 1);
    }
    emit('update:modelValue', props.modelValue);
}
</script>

<template>
    <div class="flex flex-wrap flex-col mb-2">
        <label class="block text-sm font-bold font-cairo">{{ label }}</label>
        <div class="flex flex-wrap">
            <div v-for="(option, key) in options" :key="key">
                <input @input="onInputChange" class="inline-block rounded-sm border-gray-400 text-accent-primary focus:outline-accent-primary" type="checkbox" :id="option.value" :value="option.value" :checked="value.indexOf(option.value) === 0"> <label class="text-sm font-semibold mr-2" :for="option.value">{{ option.label }}</label>
            </div>
        </div>
    </div>
</template>