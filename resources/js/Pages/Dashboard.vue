<template>
    <div class="flex">
        <div class="w-1/5">
            <the-sidebar />
        </div>
        <div class="w-4/5">
            <the-header />
        </div>
    </div>

</template>

<script>
import TheHeader from "../Templates/TheHeader.vue";
import TheSidebar from '../Templates/TheSidebar.vue';
export default {
    components: {
        TheHeader,
        TheSidebar
    },
    setup() {

    },
}
</script>