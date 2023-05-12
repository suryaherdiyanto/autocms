<script setup lang="ts">
import { defineProps, withDefaults } from "vue";
import ABox from '@/Components/ABox.vue';

interface Panel {
    title: string,
    hasFooter: boolean
}

withDefaults(defineProps<Panel>(), {
    hasFooter: false
});

</script>


<template>
    <ABox isPanel>
        <div class="w-full bg-gray-100 py-4 px-5 rounded-t-lg">
            <h3 class="font-cairo text-lg font-bold text-gray-800">{{ title }}</h3>
        </div>
        <div class="py-4 px-5 w-full">
            <slot name="content"></slot>
        </div>
        <div v-if="hasFooter" class="py-4 px-5 w-full bg-gray-100 rounded-b-lg">
            <slot name="footer"></slot>
        </div>
    </ABox>
</template>