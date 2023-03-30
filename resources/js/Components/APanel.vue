<template>
    <a-box is-panel>
        <div class="w-full bg-gray-100 py-4 px-5 rounded-t-lg">
            <h3 class="font-cairo text-lg font-bold text-gray-800">{{ title }}</h3>
        </div>
        <div class="py-4 px-5 w-full">
            <slot name="content"></slot>
        </div>
        <div v-if="hasFooter" class="py-4 px-5 w-full bg-gray-100 rounded-b-lg">
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