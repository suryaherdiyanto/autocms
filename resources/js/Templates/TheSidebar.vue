<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <aside class="min-h-screen h-full w-full p-6 bg-primary overflow-x-auto">
        <div class="flex pb-6 align-middle justify-center">
            <h1 class="text-white uppercase font-bold">auto cms</h1>
        </div>
        <h2 class="text-gray-400 pb-4 uppercase text-sm font-semibold">main menu</h2>
        <div class="flex flex-col">
            <Link href="/admin/dashboard" class="py-4 px-2 text-gray-400 text-sm font-semibold font-cairo hover:bg-primary-lighter hover:rounded">
               <i class="fa-solid fa-gauge-high mr-1"></i> Dashboard
            </Link>
            <a href="#" class="py-4 px-2 text-gray-400 text-sm font-semibold font-cairo hover:bg-primary-lighter hover:rounded">
                <i class="fa-regular fa-images mr-1"></i> Media
            </a>
            <Link href="/admin/pages" class="py-4 px-2 text-gray-400 text-sm font-semibold font-cairo hover:bg-primary-lighter hover:rounded">
                <i class="fa-regular fa-file mr-1"></i> Pages
            </Link>
            <a href="#" class="py-4 px-2 text-gray-400 text-sm font-semibold font-cairo hover:bg-primary-lighter hover:rounded">
                <i class="fa-solid fa-gear mr-1"></i> Settings
            </a>
        </div>
    </aside>
</template>