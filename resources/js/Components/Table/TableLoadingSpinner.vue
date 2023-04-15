<template>
    <div role="status" class="flex justify-center">
        <loading-spinner></loading-spinner>
        <span class="sr-only">Loading...</span>
    </div>
</template>

<script>
import LoadingSpinner from '../LoadingSpinner.vue';

export default {
    components: {
        LoadingSpinner
    },
    setup() {

    },
}
</script>