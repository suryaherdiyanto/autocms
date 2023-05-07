<script setup lang="ts">
import LoadingSpinner from '@/Components/LoadingSpinner.vue';
</script>

<template>
    <div role="status" class="flex justify-center">
        <loading-spinner></loading-spinner>
        <span class="sr-only">Loading...</span>
    </div>
</template>