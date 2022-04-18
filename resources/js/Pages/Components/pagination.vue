<script setup>
import {Link} from '@inertiajs/inertia-vue3'

const props = defineProps({
    links: Array
})

</script>

<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap mb-1">
            <template v-for="(link, p) in links" :key="p">
                <div v-if="link.url === null" class="shadow-2xl mr-1 mb-1 px-4 py-3 text-sm leading-4 bg-gray-800 text-white border-gray-800 border-2 rounded-full  transition-colors duration-500"
                    v-html="link.label" />
                <Link v-else
                    class="shadow-2xl mr-1 mb-1 px-4 py-3 text-sm leading-4 border-2 rounded-full hover:text-white border-gray-800 text-gray-800 hover:bg-gray-800 transition-colors duration-500"
                    :class="{ 'bg-gray-800 text-white': link.active }" :href="link.url" v-html="link.label" />
            </template>
        </div>
    </div>
</template>