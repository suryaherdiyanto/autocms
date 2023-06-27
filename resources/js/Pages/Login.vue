<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';

const loginForm = useForm({
    email: null,
    password: null,
    remember: false
})
</script>

<template>
    <div>
        <div class="flex flex-col items-center justify-center h-screen">
            <h1 class="text-gray-800 text-xl text-center font-cairo mb-3">AutoCMS Login</h1>
            <div class="w-96">
                <a-box>
                    <form @submit.prevent="loginForm.post('/admin/login')" action="#">
                        <a-input v-model="loginForm.email" label="Email" :errorMessage="loginForm.errors.email"></a-input>
                        <a-input v-model="loginForm.password" label="Password" type="password"></a-input>
                        <div class="flex my-2">
                            <a-checkbox v-model="loginForm.remember" name="remember" label="Remember Me" />
                            <a-submit class="ml-auto" :loading="loginForm.processing">Login</a-submit>
                        </div>
                    </form>
                </a-box>
            </div>
        </div>
    </div>
</template>