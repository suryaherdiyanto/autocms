<template>
    <div class="flex">
        <div class="w-1/5">
            <the-sidebar />
        </div>
        <div class="w-4/5">
            <the-header />

            <div class="p-6">
                <h2 class="font-cairo text-2xl font-bold">Dashboard</h2>
                <p class="text-gray-500 text-sm">Lorem ipsum dolor.</p>
                <div class="flex py-6">
                    <div class="w-1/4 mr-5">
                        <div class="bg-white rounded-lg border border-gray-200 w-full p-5">
                            <div class="flex mb-4">
                                <div class="flex w-12 h-12 justify-center items-center mr-3">
                                    <i class="fa-solid fa-paste text-accent-primary text-4xl"></i>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h3 class="font-cairo font-bold text-3xl">12</h3>
                                    <p class="text-gray-500 text-xs">Posts published</p>
                                </div>
                            </div>
                            <a href="#" class="py-1.5 px-2 rounded bg-accent-primary text-white text-xs font-semibold hover:bg-accent-primary-darker">
                                View More <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="w-1/4 mr-5">
                        <div class="bg-white rounded-lg border border-gray-200 w-full p-5">
                            <div class="flex mb-4">
                                <div class="flex w-12 h-12 justify-center items-center mr-3">
                                    <i class="fa-solid fa-envelope text-accent-primary text-4xl"></i>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h3 class="font-cairo font-bold text-3xl">13</h3>
                                    <p class="text-gray-500 text-xs">Example Widget</p>
                                </div>
                            </div>
                            <a href="#" class="py-1.5 px-2 rounded bg-accent-primary text-white text-xs font-semibold hover:bg-accent-primary-darker">
                                View More <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="w-1/4 mr-5">
                        <div class="bg-white rounded-lg border border-gray-200 w-full p-5">
                            <div class="flex mb-4">
                                <div class="flex w-12 h-12 justify-center items-center mr-3">
                                    <i class="fa-solid fa-comment text-accent-primary text-4xl"></i>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h3 class="font-cairo font-bold text-3xl">13</h3>
                                    <p class="text-gray-500 text-xs">Example Widget</p>
                                </div>
                            </div>
                            <a href="#" class="py-1.5 px-2 rounded bg-accent-primary text-white text-xs font-semibold hover:bg-accent-primary-darker">
                                View More <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="w-1/4 mr-5">
                        <div class="bg-white rounded-lg border border-gray-200 w-full p-5">
                            <div class="flex mb-4">
                                <div class="flex w-12 h-12 justify-center items-center mr-3">
                                    <i class="fa-solid fa-envelope text-accent-primary text-4xl"></i>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h3 class="font-cairo font-bold text-3xl">13</h3>
                                    <p class="text-gray-500 text-xs">Example Widget</p>
                                </div>
                            </div>
                            <a href="#" class="py-1.5 px-2 rounded bg-accent-primary text-white text-xs font-semibold hover:bg-accent-primary-darker">
                                View More <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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