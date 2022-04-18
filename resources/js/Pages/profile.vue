<script setup>
import Sidebar from './Components/sidebar.vue'
import Header from './Components/header.vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { computed } from '@vue/runtime-core'
import { Inertia } from '@inertiajs/inertia';
import { reactive } from '@vue/reactivity'

const logout = () => {
    Inertia.post('/logout')
};


const props = defineProps({
    errors: Object,
    success: Object,
});

const form = reactive({
    nik: usePage().props.value.auth.user.nik,
    nama_lengkap: usePage().props.value.auth.user.nama_lengkap
});

const updateProfile = () => {
    Inertia.post(`/profile`, form)
};
</script>

<template>

    <Sidebar>
        <template #header>
            <Header />
        </template>

    <template #main>
        <section class="max-w-lg p-6 mt-24 mx-auto text-white bg-gray-800 rounded-xl shadow-xl">
        <h2 class="text-lg font-semibold capitalize dark:text-white">Edit Profile</h2>


        <div v-if="$page.props.flash.error" class="bg-red-100 rounded-lg py-2 px-5 text-base text-red-700 mt-3" role="alert">
            {{ $page.props.flash.error }}
        </div>
        <div v-if="$page.props.flash.success" class="bg-main rounded-lg py-2 px-5 text-base text-gray-800 mt-3" role="alert">
            {{ $page.props.flash.success }}
        </div>
        
        <form @submit.prevent="updateProfile">
            <div class="grid grid-cols-1 gap-6 mt-4 text-white">
                <div>
                    <label for="nik">NIK</label>
                    <input id="nik" type="text" v-model="form.nik" placeholder="Masukkan NIK Anda" class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring" required>
                <div v-if="props.errors.nik" class="bg-red-100 rounded-lg py-2 px-5 text-base text-red-700 mt-3" role="alert">
                   {{ errors.nik }}
                </div>
                </div>
                

                <div>
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input id="nama_lengkap" type="text" v-model="form.nama_lengkap" placeholder="Masukkan nama lengkap Anda" class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring" required>
                <div v-if="props.errors.nama_lengkap" class="bg-red-100 rounded-lg py-2 px-5 mb-4 text-base text-red-700 mt-3" role="alert">
                   {{ errors.nama_lengkap }}
                </div>
                </div>

            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="px-6 py-2 leading-5 text-gray-800 font-medium transition-colors duration-200 transform bg-main rounded-lg hover:bg-main focus:outline-none focus:bg-gray-400">Edit</button>
            </div>
        </form>
    </section>
    </template>
    </Sidebar>
</template>