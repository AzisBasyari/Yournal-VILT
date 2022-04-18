<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import { computed } from '@vue/runtime-core';
import { Inertia } from '@inertiajs/inertia';

const user = computed(() => usePage().props.value.auth.user);

const logout = () => {
    Inertia.post('/logout')
};
</script>

<template>
    <nav class="bg-main shadow-md">
        <div class="container px-6 py-4 mx-auto flex justify-between items-center">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl text-gray-800 hover:text-gray-900">Halo, {{ user.nama_lengkap }}</h2>
                </div>
            </div>
            <div class="">
                <form @submit.prevent="logout">
                    <button type="submit" class="my-1 text-sm font-medium text-white duration-500 mx-2 border-2 bg-gray-800 hover:bg-gray-900 px-10 py-2 rounded-full">Keluar</button>
                </form>
            </div>
        </div>
    </nav>    
</template>


