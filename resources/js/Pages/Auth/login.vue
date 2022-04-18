<script setup>
import Navbar from '../Components/navbar.vue'
import {Link} from '@inertiajs/inertia-vue3'
import { reactive } from '@vue/reactivity'
import { Inertia } from '@inertiajs/inertia';

const form = reactive({
    nik: '',
    password: ''
});

const storeLogin = () => {
    Inertia.post('/login', form)
};

const props = defineProps({
    errors: Object,
});
</script>

<template>
    <Navbar>
        <div class="flex flex-row">
            <Link class="my-1 text-sm font-medium text-gray-700 duration-500 mx-2 border-2 border-gray-700 hover:bg-gray-800 hover:text-white px-10 py-2 rounded-full" href="/register">Daftar</Link>
        </div>
    </Navbar>
    <section class="max-w-lg p-6 mt-24 mx-auto text-white bg-gray-800 rounded-xl shadow-xl">
        <h2 class="text-lg font-semibold capitalize dark:text-white">Masuk</h2>
        <div v-if="$page.props.flash.error" class="bg-red-100 rounded-lg py-2 px-5 text-base text-red-700 mt-3" role="alert">
            {{ $page.props.flash.error }}
        </div>
        
        <form @submit.prevent="storeLogin">
            <div class="grid grid-cols-1 gap-6 mt-4 text-white">
                <div>
                    <label for="nik">NIK</label>
                    <input id="nik" type="text" v-model="form.nik" placeholder="Masukkan NIK Anda" class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring" required>
                <div v-if="props.errors.nik" class="bg-red-100 rounded-lg py-2 px-5 text-base text-red-700 mt-3" role="alert">
                   {{ errors.nik }}
                </div>
                </div>
                

                <div>
                    <label for="password">Kata Sandi</label>
                    <input id="password" type="password" v-model="form.password" placeholder="Masukkan kata sandi Anda" class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring" required>
                <div v-if="props.errors.password" class="bg-red-100 rounded-lg py-2 px-5 mb-4 text-base text-red-700 mt-3" role="alert">
                   {{ errors.password }}
                </div>
                </div>

            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="px-6 py-2 leading-5 text-gray-800 font-medium transition-colors duration-200 transform bg-main rounded-lg hover:bg-main focus:outline-none focus:bg-gray-400">Masuk</button>
            </div>
        </form>
    </section>
</template>