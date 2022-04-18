<script setup>
import Navbar from './Components/navbar.vue'
import {Link} from '@inertiajs/inertia-vue3'
import { usePage } from '@inertiajs/inertia-vue3'

const props = defineProps({
    errors: Object,
    success: Object
});
</script>

<template>
  <Navbar>
    <div class="flex flex-row">

    <Link class="my-1 text-sm font-medium text-gray-700 duration-500 mx-2 border-2 border-gray-700 hover:bg-gray-800 hover:text-white px-10 py-2 rounded-full" href="/register">Daftar</Link>
    <Link class="my-1 text-sm font-medium text-white duration-500 mx-2 border-2 bg-gray-700 hover:bg-gray-800 px-10 py-2 rounded-full" href="/login">Masuk</Link>
    </div>
  </Navbar>

  <div v-if="$page.props.flash.error" class="bg-red-100 rounded-lg py-2 px-5 text-base text-red-700 mt-3 max-w-lg mx-auto" role="alert">
    {{ $page.props.flash.error }}
  </div>

  <div v-if="$page.props.flash.success" class="bg-gray-800 rounded-lg py-2 px-5 text-base text-white my-3 max-w-lg mx-auto" role="alert">
    {{ $page.props.flash.success }}
  </div>
</template>