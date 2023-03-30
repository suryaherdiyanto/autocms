<template>
    <a-box is-panel>
        <div class="w-full bg-gray-300 py-4 px-5 rounded-t-lg">
            <h3 class="font-cairo text-xl font-bold">{{ title }}</h3>
        </div>
        <div class="p-5 w-full">
            <slot name="content"></slot>
        </div>
        <div v-if="hasFooter" class="py-4 px-5 w-full bg-gray-300 rounded-b-lg">
            <slot name="footer"></slot>
        </div>
    </a-box>
</template>

<script>
import ABox from './ABox.vue';

export default {
    components: {
        ABox
    },
    props: {
        title: {
            type: String
        },
        hasFooter: {
            type: Boolean,
            default: false
        }
    },
    setup() {

    },
}
</script>