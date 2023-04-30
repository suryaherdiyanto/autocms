<template>
    <div class="flex flex-col">
        <label class="text-sm font-bold font-cairo mb-1">{{ label }}</label>
        <editor v-model="value" :api-key="tinymceApiKey" :init="tinymceInit" />
        <span v-if="errorMessage" class="text-sm text-red-400 font-semibold">{{ errorMessage }}</span>
    </div>
</template>

<script>
import { computed, reactive, ref } from 'vue';
import Editor from '@tinymce/tinymce-vue';

export default {
    components: {
        Editor
    },
    props: {
        name: {
            type: String
        },
        modelValue: {
            type: String
        },
        errorMessage: {
            type: String
        },
        label: {
            type: String
        }
    },
    setup(props, { emit }) {
        const value = computed({
            set(value) {
                emit('update:modelValue', value);
            },
            get() {
                return props.modelValue
            }
        });
        const tinymceInit = reactive({
            plugins: 'anchor autolink charmap codesample image link lists media searchreplace table wordcount',
            toolbar: 'undo redo | fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | charmap | removeformat'
        })
        const tinymceApiKey = ref(import.meta.env.VITE_TINYMCE_API_KEY);

        return { value, tinymceInit, tinymceApiKey }
    },
}
</script>