<template>
    <div class="w-full h-32 bg-gray-300/60 absolute z-10">
        <div class="p-4 bg-primary absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded">
            <table-loading-spinner></table-loading-spinner>
            <span class="text-white text-sm font-semibold">Please wait...</span>
        </div>
    </div>
</template>

<script>
import TableLoadingSpinner from './TableLoadingSpinner.vue';

export default {
    components: {
        TableLoadingSpinner
    },
    setup() {

    },
}
</script>