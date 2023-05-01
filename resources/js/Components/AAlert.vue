<template>
    <transition name="fade">
    <div v-if="!isClosed" :class="typeStyle.bg" class="block border p-3 rounded mb-2">
        <div class="flex">
            <p :class="typeStyle.text" class="text-sm"> <i class="fa-solid fa-circle-exclamation"></i> &nbsp; {{ message }}</p>
            <a @click.prevent="closeAlert" :class="typeStyle.text" class="text-sm font-semibold ml-auto" href="#"><i class="fa-solid fa-times"></i></a>
        </div>
    </div>
    </transition>
</template>

<script>
import { computed, ref } from 'vue'
export default {
    props: {
        message: {
            type: String,
            required: true
        },
        type: {
            type: String,
            default: 'success'
        }
    },
    setup(props, { emit }) {
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
                        }
                    }
                    break;
            }
        });

        function closeAlert() {
            isClosed.value = true;
        }

        return { typeStyle, isClosed, closeAlert }
    },
}
</script>

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