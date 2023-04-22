<template>
    <div class="block mb-2">
        <label :for="name" class="text-sm font-bold font-cairo">{{ label }}</label>
        <input v-model="value" :type="type" name="first_name" :id="name" class="w-full h-8 border rounded border-gray-200 outline-none px-1 text-sm focus:border-accent-primary">
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
        modelValue: {
            type: String
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