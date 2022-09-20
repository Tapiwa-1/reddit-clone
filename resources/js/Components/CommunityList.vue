<template>
  <div class="">
    
        <div class=" bg-white rounded- border border-gray-200 shadow-md rounded ">
            <div class=" bg-blue-700 rounded- border pt-10">
                <h4 class=" text-2xl font-bold text-white mb-2 mx-1 tracking-tigh mt-10">
                    <slot name="title"></slot>
                </h4>
            </div>
            
            <div class="p-5">
                <ul>
                    <li v-for="community in communities" :key="community.id"  class="divide-y divide-slate-300 dark:divide-slate-700">
                        <div class="flex item-center space-x-4 my-5">
                            <Link :href="route('frontend.communities.show',community.slug)" class="text-slate-800  dark:text-slate-400 font-semibold truncate text-ss">
                                {{community.name}}
                            </Link>
                            <div class="">
                                Posts({{community.posts_count}})
                            </div>
                        </div>
                    </li> 
                </ul>
              
            </div>
        </div>

  </div>
</template>

<script setup>
  import { Link } from "@inertiajs/inertia-vue3";
  defineProps({
    communities: Object,
  })
</script>
    
<style>

</style>