<template>
    <div class="block mb-2">
        <label :for="name" class="text-sm font-bold font-cairo">{{ label }}</label>
        <input v-model="value" :type="type" :placeholder="placeholder" name="first_name" :id="name" :class="{'border-gray-400': !errorMessage, 'border-red-400': errorMessage}" class="w-full h-8 border rounded px-1 text-sm font-semibold focus:ring-accent-primary focus:border-accent-primary active:border-accent-primary">
        <span v-if="errorMessage" class="text-sm text-red-400 font-semibold">{{ errorMessage }}</span>
    </div>
</template>

<script>
import { computed } from 'vue'
export default {
    props: {
        type: {
            type: String,
            default: 'text'
        },
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