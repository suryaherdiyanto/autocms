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
            type: Array
        }
    },
    emits: ['update:modelValue'],
    setup(props, { emit }) {
        const value = computed({
            get() {
                return props.modelValue;
            }
        });
        function onInputChange($event) {

            if ($event.target.checked) {
                props.modelValue.push($event.target.value);
            } else {
                const removeIndex = props.modelValue.indexOf($event.target.value);
                props.modelValue.splice(removeIndex, 1);
            }

            emit('update:modelValue', props.modelValue);
        }
        return { value, onInputChange };
    },
}
</script>