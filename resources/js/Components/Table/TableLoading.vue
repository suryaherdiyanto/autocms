<script setup lang="ts">
import TableLoadingSpinner from '@/Components/Table/TableLoadingSpinner.vue';
</script>

<template>
    <div class="w-full h-full bg-gray-100/30 absolute z-10">
        <div class="p-4 bg-primary absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded">
            <TableLoadingSpinner />
            <span class="text-white text-sm font-semibold">Please wait...</span>
        </div>
    </div>
</template>