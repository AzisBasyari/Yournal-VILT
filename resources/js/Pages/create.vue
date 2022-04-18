<script setup>
import Sidebar from './Components/sidebar.vue'
import Header from './Components/header.vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { computed } from '@vue/runtime-core'
import { Inertia } from '@inertiajs/inertia';
import { reactive } from '@vue/reactivity'

const user = computed(() => usePage().props.value.auth.user);

const logout = () => {
    Inertia.post('/logout')
};

const form = reactive({
    nama_tempat: '',
    alamat: '',
    tanggal: '',
    jam: '',
    suhu_tubuh: '',
    kendaraan: '',
});

const storeCatatan = () => {
    Inertia.post('/catatan', form)
};

const props = defineProps({
    errors: Object,
    success: Object
});
</script>

<template>

    <Sidebar>
        <template #header>
            <Header />
        </template>

    <template #main>
            <section class="max-w-4xl p-6 my-5 mx-auto text-white bg-gray-800 rounded-xl shadow-xl">
                <h2 class="text-2xl capitalize dark:text-white">Buat Catatan</h2>

                <div class="border-t border-2 my-2 rounded-full"></div>

                <div v-if="$page.props.flash.error" class="bg-red-100 rounded-lg py-2 px-5 text-base text-red-700 mt-3" role="alert">
                    {{ $page.props.flash.error }}
                </div>
                <div v-if="$page.props.flash.success" class="bg-main rounded-lg py-2 px-5 text-base text-gray-800 mt-3" role="alert">
                    {{ $page.props.flash.success }}
                </div>
                
                <form @submit.prevent="storeCatatan">
                    <div class="grid grid-cols-1 gap-6 mt-4 text-white">
                        <div>
                            <label for="nama_tempat">Nama Tempat</label>
                            <input id="nama_tempat" type="text" v-model="form.nama_tempat" placeholder="Masukkan nama tempat" class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring" required>
                            
                            <div v-if="props.errors.nama_tempat" class="bg-red-100 rounded-lg py-2 px-5 text-base text-red-700 mt-3" role="alert">
                                {{ errors.nama_tempat }}
                            </div>
                        </div>

                        <div>
                            <label for="alamat">Alamat</label>
                            <input id="alamat" type="text" v-model="form.alamat" placeholder="Masukkan alamat" class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring" required>

                            <div v-if="props.errors.alamat" class="bg-red-100 rounded-lg py-2 px-5 text-base text-red-700 mt-3" role="alert">
                                {{ errors.alamat }}
                            </div>
                        </div>

                        <div>
                            <label for="tanggal">Tanggal</label>
                            <input id="tanggal" type="date" v-model="form.tanggal" placeholder="Masukkan tanggal" class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring" required>

                            <div v-if="props.errors.tanggal" class="bg-red-100 rounded-lg py-2 px-5 text-base text-red-700 mt-3" role="alert">
                                {{ errors.tanggal }}
                            </div>
                        </div>

                        <div>
                            <label for="jam">Jam</label>
                            <input id="jam" type="time" v-model="form.jam" placeholder="Masukkan jam" class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring" required>

                            <div v-if="props.errors.jam" class="bg-red-100 rounded-lg py-2 px-5 text-base text-red-700 mt-3" role="alert">
                                {{ errors.jam }}
                            </div>
                        </div>

                        <div>
                            <label for="suhu_tubuh">Suhu tubuh</label>
                            <input id="suhu_tubuh" type="number" min='36' step='0.1' v-model="form.suhu_tubuh" placeholder="Masukkan suhu_tubuh" class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring" required>

                            <div v-if="props.errors.suhu_tubuh" class="bg-red-100 rounded-lg py-2 px-5 text-base text-red-700 mt-3" role="alert">
                                {{ errors.suhu_tubuh }}
                            </div>
                        </div>

                        <div>
                            <label for="kendaraan">Kendaraan</label>
                            <select v-model="form.kendaraan" name="kendaraan" id="kendaraan" class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring">
                                <option value="">Pilih Kendaraan</option>
                                <option value="" disabled>--------------------</option>
                                <option value="Jalan Kaki">Jalan Kaki</option>
                                <option value="Sepeda">Sepeda</option>
                                <option value="Angkutan Umum">Angkutan Umum</option>
                                <option value="Motor">Motor</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Kereta">Kereta</option>
                                <option value="Pesawat">Pesawat</option>
                            </select>

                            <div v-if="props.errors.kendaraan" class="bg-red-100 rounded-lg py-2 px-5 text-base text-red-700 mt-3" role="alert">
                                {{ errors.kendaraan }}
                            </div>
                        </div>


                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="px-6 py-2 leading-5 text-gray-800 font-medium transition-colors duration-200 transform bg-main rounded-lg hover:bg-main focus:outline-none focus:bg-gray-400">Buat</button>
                    </div>
                </form>
            </section>
    </template>
    </Sidebar>
</template>