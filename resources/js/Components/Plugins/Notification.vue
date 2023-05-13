<script setup lang="ts">
import { defineProps, withDefaults, ref, reactive, onMounted, defineEmits } from "vue";

interface NotificationProps {
    title?: string,
    message: string,
    offset?: number
}

const props = withDefaults(defineProps<NotificationProps>(), {
    title: 'Notification',
    offset: 16
});
const isClosed = ref<boolean>(true);
const style = reactive({
    'top': props.offset+'px'
});

const emit = defineEmits<{
    (e: 'onClosed'): void
}>()

function closed() {
    isClosed.value = true;
    emit('onClosed');
}

function show() {
    isClosed.value = false;
}

onMounted(() => {
    show();

    setTimeout(() => {
        closed();
    }, 5000)
})
</script>
<template>
    <div>
        <transition name="slide">
            <div v-if="!isClosed" :style="style" class="a-notification w-72 px-4 py-2 bg-white border border-gray-200 rounded fixed top-5 right-5 z-50">
                <h4 class="font-cairo text-gray-800 font-bold">{{ props.title }} <span class="text-sm text-gray-400 cursor-pointer float-right"><i @click="closed" class="fa-regular fa-circle-xmark"></i></span></h4>
                <p class="text-gray-800 text-sm">{{ props.message }}</p>
            </div>
        </transition>
    </div>
</template>

<style>
.slide-enter-active,
.slide-leave-active {
    transition: all 0.35s ease;
}

.slide-enter-from,
.slide-leave-to {
    transform: translateX(90px);
    opacity: 0;
}

.slide-enter-to,
.slide-leave-from {
    transform: translateX(0px);
    opacity: 1;
}
</style>