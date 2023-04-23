<template>
    <div class="block mb-2">
        <label :for="name" class="text-sm font-bold font-cairo">{{ label }}</label>
        <textarea v-model="value" :id="name" :placeholder="placeholder" :class="{'border-gray-200': !errorMessage, 'border-red-400': errorMessage}" class="w-full h-24 border rounded outline-none px-1 text-sm focus:border-accent-primary"></textarea>
        <span v-if="errorMessage" class="text-sm text-red-400 font-semibold">{{ errorMessage }}</span>
    </div>
</template>

<script>
import { computed } from 'vue'
export default {
    props: {
        name: {
            type: String
        },
        label: {
            type: String
        },
        placeholder: {
            type: String
        },
        modelValue: {
            type: String
        },
        errorMessage: {
            type: String,
            default: null
        }
    },
    emits: ['update:modelValue'],
    setup(props, { emit }) {
        const value = computed({
            set(value) {
                emit('update:modelValue', value);
            },
            get() {
                return props.modelValue;
            }
        });

        return { value };
    },
}
</script>