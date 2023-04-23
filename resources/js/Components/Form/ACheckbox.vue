<template>
    <input v-model="value" class="inline-block rounded-sm border-gray-400 text-accent-primary focus:outline-accent-primary" :id="name" type="checkbox"> <label class="text-sm font-semibold mr-2" :for="name">{{ label }}</label>
</template>

<script>
import { computed } from 'vue'
export default {
    props: {
        label: {
            type: String,
        },
        modelValue: {
            type: String
        },
        name: {
            type: String,
        }
    },
    emits: ['update:modelValue'],
    setup(props, { emit }) {
        const value = computed({
            get() {
                return props.modelValue;
            },
            set(value) {
                emit('update:modelValue', value);
            }
        });

        return { value }
    },
}
</script>