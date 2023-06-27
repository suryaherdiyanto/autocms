<script lang="ts" setup>
import { usePage } from '@inertiajs/vue3';

const page = usePage();
</script>
<template>
    <div class="w-full bg-primary px-6">
        <div class="flex justify-end items-center w-full divide-x divide-primary-darker">
            <div class="inline-block px-2 py-6">
                <span class="p-2.5 relative hover:bg-primary-lighter hover:rounded">
                    <i class="fa-regular fa-bell text-gray-500 text-xl cursor-pointer"></i>
                    <span class="w-5 h-5 flex justify-center items-center font-cairo font-bold bg-sky-600 text-black rounded-full text-xs absolute top-0 right-0">10</span>
                </span>
                <span class="p-2.5 relative hover:bg-primary-lighter hover:rounded">
                    <i class="fa-regular fa-envelope text-gray-500 text-xl cursor-pointer"></i>
                    <span class="w-5 h-5 flex justify-center items-center font-cairo font-bold bg-sky-600 text-black rounded-full text-xs absolute top-0 right-0">6</span>
                </span>
                <span class="p-2.5 relative hover:bg-primary-lighter hover:rounded">
                    <i class="fa-regular fa-comment text-gray-500 text-xl cursor-pointer"></i>
                    <span class="w-5 h-5 flex justify-center items-center font-cairo font-bold bg-sky-600 text-black rounded-full text-xs absolute top-0 right-0">5</span>
                </span>
            </div>
            <div class="px-2 py-6 flex items-center cursor-pointer hover:bg-primary-lighter relative group">
                <img width="32" height="32" src="../../images/blank-profile-picture.png" alt="Profile Pic" class="rounded mr-3">
                <div class="flex flex-col mr-5">
                    <span class="font-cairo text-white font-semibold text-sm">{{ page.props.user.name }}</span>
                    <span class="font-cairo text-gray-500 font-semibold text-xs">Administrator</span>
                </div>
                <i class="fa-solid fa-caret-down text-accent-primary"></i>

                <dib class="absolute w-full bg-white border rounded border-gray-200 left-0 top-full transition-all duration-200 translate-y-6 opacity-30 invisible group-hover:visible group-hover:translate-y-0 group-hover:opacity-100">
                    <a class="block p-4 text-sm border-b border-b-gray-200 hover:bg-gray-100" href="#"><i class="fas fa-user"></i>&nbsp; Profile</a>
                    <a class="block p-4 text-sm border-b-gray-200 hover:bg-gray-100" href="#"><i class="fas fa-power-off"></i>&nbsp; Logout</a>
                </dib>
            </div>
        </div>
    </div>
</template>