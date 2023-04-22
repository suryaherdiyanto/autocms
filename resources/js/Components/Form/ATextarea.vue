<template>
    <div class="block mb-2">
        <label :for="name" class="text-sm font-bold font-cairo">{{ label }}</label>
        <textarea v-model="value" :id="name" :placeholder="placeholder" class="w-full h-24 border rounded border-gray-200 outline-none px-1 text-sm focus:border-accent-primary"></textarea>
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