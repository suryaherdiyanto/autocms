<script setup lang="ts">
import AButton from "@/Components/AButton.vue";
import { defineProps, defineEmits, withDefaults, ref, onMounted } from "vue";

interface MessageBoxProps {
    title?: string,
    okText?: string,
    showCancelButton?: boolean,
    cancelText?: string,
    message: string
}

const isClosed = ref(true);

const props = withDefaults(defineProps<MessageBoxProps>(), {
    title: "Alert",
    okText: "OK",
    showCancelButton: false,
    cancelText: "Cancel"
});

const emit = defineEmits<{
    (e: 'closed'): void,
    (e: 'confirmed'): void,
    (e: 'canceled'): void
}>();

function closed() {
    isClosed.value = true;

    emit('closed');
}

function confirmed() {
    closed();
    emit('confirmed');
}

function canceled() {
    closed();
    emit('canceled');
}

function show() {
    isClosed.value = false;
}

onMounted(() => {
    show();
})
</script>

<template>
    <transition name="slide-fade">
        <div v-if="!isClosed" class="w-full top-0 left-0 h-screen fixed bg-gray-800/40 bd z-50">
            <div class="flex relative flex-col w-80 p-3 bg-white border border-gray-200 rounded inset-0 mx-auto mt-[20%] z-50 message-box">
                <h4 class="font-cairo text-gray-800 font-bold">{{ props.title }} <span class="text-sm text-gray-400 cursor-pointer float-right"><i @click="closed" class="fa-regular fa-circle-xmark"></i></span></h4>
                <p class="text-gray-800 text-sm">{{ props.message }}</p>
                <div class="flex justify-end mt-2">
                    <a-button v-if="props.showCancelButton" @click="canceled" type="light">{{ props.cancelText }}</a-button>
                    <a-button @click="confirmed" class="ml-2">{{ props.okText }}</a-button>
                </div>
            </div>
        </div>
    </transition>
</template>

<style scoped>
.bd{
    transition: opacity 0.2s ease;
}

.message-box {
    transition: transform 0.3s ease-out, opacity 0.2s ease;
}

.slide-fade-enter-from .bd,
.slide-fade-leave-to .bd {
    opacity: 0;
}
.slide-fade-enter-from .message-box,
.slide-fade-leave-to .message-box {
    transform: translateY(-50px);
    opacity: 0;
}

.slide-fade-enter-to .bd,
.slide-fade-leave-from .bd {
    opacity: 1;
}

.slide-fade-enter-to .message-box,
.slide-fade-leave-from .message-box {
    transform: translateY(0px);
    opacity: 1;
}
</style>