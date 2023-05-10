<script setup lang="ts">
import { computed, reactive, ref, defineProps, defineEmits } from "vue";
import Editor from '@tinymce/tinymce-vue';

interface Props {
    name: string,
    modelValue: string,
    errorMessage: string,
    label: string
}

const props = defineProps<Props>()
const emit = defineEmits<{
    (e: 'update:modelValue', value: string): void
}>()

const value = computed({
    set(value: string) {
        emit('update:modelValue', value);
    },
    get() {
        return props.modelValue;
    }
});
const tinymceInit = reactive({
    plugins: 'anchor autolink charmap codesample image link lists media searchreplace table wordcount',
    toolbar: 'undo redo | fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | charmap | removeformat'
})
const tinymceApiKey = ref(import.meta.env.VITE_TINYMCE_API_KEY);
</script>
<template>
    <div class="flex flex-col">
        <label class="text-sm font-bold font-cairo mb-1">{{ label }}</label>
        <editor v-model="value" :api-key="tinymceApiKey" :init="tinymceInit" />
        <span v-if="errorMessage" class="text-sm text-red-400 font-semibold">{{ errorMessage }}</span>
    </div>
</template>