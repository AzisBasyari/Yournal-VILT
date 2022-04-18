<script setup>
import Header from './Components/header.vue'
import Sidebar from './Components/sidebar.vue'
import Pagination from './Components/pagination.vue'
import { Link, usePage } from '@inertiajs/inertia-vue3'
import { computed } from '@vue/runtime-core'
import { Inertia } from '@inertiajs/inertia';
import moment from 'moment';

const user = computed(() => usePage().props.value.auth.user);

const logout = () => {
    Inertia.post('/logout')
};

const props = defineProps({
    catatan: Array
    
})

const no = 1;

const editCatatan = (id) => {
    Inertia.get(`catatan/${id}/edit`)
};

const destroyCatatan = (id) => {
    Inertia.delete(`catatan/${id}`)
};
</script>

<template>
    <Sidebar>
        <template #header>
            <Header />
        </template>

        <template #main>
            <section class="m-5">
                <div class="">
                    <div v-if="$page.props.flash.error" class="bg-red-100 rounded-lg py-2 px-5 text-base text-red-700 mt-3" role="alert">
                        {{ $page.props.flash.error }}
                    </div>

                    <div v-if="$page.props.flash.success" class="bg-gray-800 rounded-lg py-2 px-5 text-base text-white my-3" role="alert">
                        {{ $page.props.flash.success }}
                    </div>

                    <table class="w-full table-auto bg-gray-800 text-white rounded-lg shadow-lg">
                        <thead>
                            <tr class="text-center text-lg border-b border-gray-900 shadow-sm">
                                <td scope="col" class="px-2 py-3">No.</td>
                                <td scope="col" class="px-2 py-3">Tanggal</td>
                                <td scope="col" class="px-2 py-3">Jam</td>
                                <td scope="col" class="px-2 py-3">Nama Tempat</td>
                                <td scope="col" class="px-2 py-3">Alamat</td>
                                <td scope="col" class="px-2 py-3">Suhu Tubuh</td>
                                <td scope="col" class="px-2 py-3">Kendaraan</td>
                                <td scope="col" class="px-2 py-3" colspan="3">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center" v-for="(catatan, index) in catatan.data" :key="catatan.id">
                                <td scope="col" class="py-3">{{ index+1 }}</td>
                                <td scope="col" class="py-3">{{ moment(catatan.tanggal).format('LLLL') }}</td>
                                <td scope="col" class="py-3">{{ moment(catatan.jam, 'HH:mm:ss').format('LT') }}</td>
                                <td scope="col" class="py-3">{{ catatan.nama_tempat }}</td>
                                <td scope="col" class="text-left py-3">{{ catatan.alamat }}</td>
                                <td scope="col" class="py-3">{{ catatan.suhu_tubuh }}</td>
                                <td scope="col" class="py-3">{{ catatan.kendaraan }}</td>
                                <td scope="col" class="py-3 pr-2">
                                    <button @click.prevent="editCatatan(`${catatan.id}`)" class="py-2">
                                        <img src="https://img.icons8.com/material-rounded/24/1f2937/edit.png" class="duration-500 bg-white hover:bg-gray-900 px-2 py-2 rounded-full"/>
                                    </button>
                                </td>
                                
                                <td scope="col" class="py-3 pr-2">
                                    <button @click.prevent="destroyCatatan(`${catatan.id}`)" class="py-2">
                                        <img src="https://img.icons8.com/material-rounded/24/1f2937/delete.png" class="duration-500 bg-white hover:bg-gray-900 px-2 py-2 rounded-full"/>
                                    </button>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div> 

                <Pagination class="mt-5 flex justify-end" :links="catatan.links" />
            </section>
        </template>

    </Sidebar>
</template>