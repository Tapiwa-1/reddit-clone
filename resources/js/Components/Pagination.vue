<template>
  <div class="flex">
    <template v-for="(link,key) in links" :key="key">
        <div v-if="link.url == null" v-html="link.label" class="mb-1 mr-1 px-4 py-3 text-gray-500 text-sm leading-4 border rounded"></div>
        <Link v-else :href="link.url" :class="{'bg-gray-700 text-white' : link.active}" v-html="link.label" class="mb-1 mr-1 px-4 py-3 text-gray-900 text-sm leading-4 border rounded hover:bg-gray-500 hover:text-grey-700 focus:test-indigo-500 focus:border-indigo-500" ></Link>
    </template>
  </div>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';

    defineProps({
        links:[]
    })
</script>
