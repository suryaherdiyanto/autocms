<script setup lang="ts">
import { defineProps, computed, ref, withDefaults } from "vue";

interface Alert {
    message: string,
    type: string
}

const props = withDefaults(defineProps<Alert>(), {
    type: 'success'
});

const isClosed = ref(false);
const typeStyle = computed(() => {
            switch (props.type) {
                case 'warning':
                    return {
                        bg: {
                            'bg-yellow-200': true,
                            'bg-opacity-60': true,
                            'border-yellow-500': true
                        },
                        text: {
                            'text-yellow-500': true
                        },
                        icon: {
                            'fa-solid fa-triangle-exclamation': true
                        }
                    }
                    break;
                case 'success':
                    return {
                        bg: {
                            'bg-green-200': true,
                            'bg-opacity-60': true,
                            'border-green-500': true
                        },
                        text: {
                            'text-green-500': true
                        },
                        icon: {
                            'fa-solid fa-circle-check': true
                        }
                    }
                    break;
                case 'danger':
                    return {
                        bg: {
                            'bg-red-200': true,
                            'bg-opacity-60': true,
                            'border-red-500': true
                        },
                        text: {
                            'text-red-500': true
                        },
                        icon: {
                            'fa-regular fa-circle-xmark': true
                        }
                    }
                    break;
                default:
                    return {
                        bg: {
                            'bg-blue-200': true,
                            'bg-opacity-60': true,
                            'border-blue-500': true
                        },
                        text: {
                            'text-blue-500': true
                        },
                        icon: {
                            'fa-solid fa-circle-exclamation': true
                        }
                    }
                    break;
            }
});

function closeAlert() {
    isClosed.value = true;
}
</script>
<template>
    <transition name="fade">
    <div v-if="!isClosed" :class="typeStyle.bg" class="block border p-3 rounded mb-2">
        <div class="flex">
            <p :class="typeStyle.text" class="text-sm"> <i :class="typeStyle.icon"></i> &nbsp; {{ message }}</p>
            <a @click.prevent="closeAlert" :class="typeStyle.text" class="text-sm font-semibold ml-auto" href="#"><i class="fa-solid fa-times"></i></a>
        </div>
    </div>
    </transition>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.35s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>