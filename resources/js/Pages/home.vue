<script setup>
import Sidebar from './Components/sidebar.vue'
import Header from './Components/header.vue'
import Pagination from './Components/pagination.vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia';
import moment from 'moment';

const logout = () => {
    Inertia.post('/logout')
};

const props = defineProps({
    catatan: Array
})
</script>

<template>

    <Sidebar>
        <template #header>
            <Header />
        </template>
    
    <template #main>
        <section class="m-5">
            <h1 class="text-3xl text-gray-800 hover:text-gray-900">Catatan Terbaru</h1>

            <div class="grid grid-cols-3 gap-5 my-5">
                <div v-for="catatan in catatan.data" :key="catatan.id">
                    <div class="bg-gray-800 rounded-lg shadow-2xl text-white px-5 py-5">
                        <div class="flex justify-between text-sm">
                            <p>
                                {{ moment(catatan.tanggal).format('LLLL') }} |
                                {{ moment(catatan.jam, 'HH:mm:ss').format('LT') }}
                            </p>
                            <p>{{ catatan.suhu_tubuh }}&#8451;</p>
                        </div>

                        <div class="border-t border-1 border-main my-1"></div>

                        <h1 class="text-2xl">{{ catatan.nama_tempat }}</h1>

                        <div class="flex justify-between">
                            <h2>{{ catatan.alamat }}</h2>
                            <h2>{{ catatan.kendaraan }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <Pagination class="mt-5 flex justify-end" :links="catatan.links" />

        </section>
    </template>
    </Sidebar>
</template>