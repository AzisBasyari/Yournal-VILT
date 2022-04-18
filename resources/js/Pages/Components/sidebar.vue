<script setup>
import {Link} from '@inertiajs/inertia-vue3';
</script>

<template>
    <div class="relative flex min-h-screen">
        <div class="bg-gray-800 text-main w-64">
            <div class="container py-5 flex justify-center items-center">
                <Link class="flex items-center justify-between text-2xl font-bold text-main delay-500 transition-all duration-500 transform lg:text-3xl hover:text-white" href="#">Yournal</Link>
            </div>
            <nav class="py-4 px-4">
                    <Link class="group text-md flex items-center mb-5 py-2 hover:bg-gray-700 transition-colors duration-500 transform rounded-full" :class="{ 'bg-main text-gray-800 hover:bg-white px-5' : $page.url.startsWith('/home') }" href="/home">
                        <div class="duration-1000" :class="{ 'group-hover:translate-x-5' : $page.url !== '/home' }">
                        Halaman Utama
                        </div>
                    </Link>

                    <Link class="group text-md flex items-center mb-5 py-2 hover:bg-gray-700 transition-colors duration-500 transform rounded-full" :class="{ 'bg-main text-gray-800 hover:bg-white px-5' : $page.url === '/catatan/create' }" href="/catatan/create">
                        <div class="duration-1000" :class="{ 'group-hover:translate-x-5' : $page.url !== '/catatan/create' }">
                        Buat Catatan
                        </div>
                    </Link>

                    <Link class="group text-md flex items-center mb-5 py-2 hover:bg-gray-700 transition-colors duration-500 transform rounded-full" :class="{ 'bg-main text-gray-800 hover:bg-white px-5' : $page.url === ('/catatan') }" href="/catatan">
                        <div class="duration-1000" :class="{ 'group-hover:translate-x-5' : $page.url !== '/catatan' }">
                        Kelola Catatan
                        </div>
                    </Link>

                    <div class="border-t border-1 border-main mb-5 rounded-full"></div>

                    <Link class="group text-md flex items-center mb-5 py-2 hover:bg-gray-700 transition-colors duration-500 transform rounded-full" :class="{ 'bg-main text-gray-800 hover:bg-white px-5' : $page.url.startsWith('/profile') }" href="/profile">
                        <div class="duration-1000" :class="{ 'group-hover:translate-x-5' : $page.url !== '/profile' }">
                        Profil
                        </div>
                    </Link>
            </nav>
        </div>

        <div class="flex-1">
            <slot name="header" />
            <slot name="main" />
        </div>
    </div>
</template>