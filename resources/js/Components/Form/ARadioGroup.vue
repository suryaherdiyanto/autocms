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

<script>
import { computed } from 'vue';
export default {
    props: {
        label: {
            type: String,
        },
        name: {
            type: String,
            required: true,
        },
        options: {
            type: Array,
            required: true
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