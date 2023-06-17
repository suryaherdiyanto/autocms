<script setup lang="ts">
import { ref } from 'vue';

const errorMessage = ref(null);
</script>

<template>
    <div>
        <div class="flex flex-col items-center justify-center h-screen">
            <h1 class="text-gray-800 text-xl text-center font-cairo mb-3">AutoCMS Login</h1>
            <div class="w-96">
                <a-box>
                    <a-alert v-show="errorMessage" :message="errorMessage" type="warning"></a-alert>
                    <form action="#">
                        <a-input label="Email"></a-input>
                        <a-input label="Password" type="password"></a-input>
                        <div class="flex my-2">
                            <a-checkbox name="remember" label="Remember Me" />
                            <a-button class="ml-auto">Login</a-button>
                        </div>
                    </form>
                </a-box>
            </div>
        </div>
    </div>
</template>