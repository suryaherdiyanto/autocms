
import TheHeader from './Templates/TheHeader.vue';
<script setup lang="ts">
import TheHeader from './Templates/TheHeader.vue';
import TheSidebar from './Templates/TheSidebar.vue';
</script>
<template>
    <div class="flex">
        <div class="w-1/5">
            <TheSidebar />
        </div>
        <div class="w-4/5">
            <TheHeader />

            <slot />
        </div>
    </div>
</template>