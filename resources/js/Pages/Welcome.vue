<template>
    <guest-layout>
      <section class="flex flex-col md:flex-row m-2 p-2 ">
        <div class="w-full  md:w-8/12">
          <PostCard v-for="post in posts.data" :post="post" :community="post.community_slug" :key="post.id"/>
        </div>
        <div class="w-full  md:w-4/12">
          <div class="m-4">
            <CommunityList :communities="communities.data">
                <template #title>
                   Top Communities
                </template>
            </CommunityList>
            
          </div>
        </div>
      </section>
    </guest-layout>
  </template>
  
  <script setup>
  
  import GuestLayout from '@/Layouts/Guest.vue';
  import {Link } from '@inertiajs/inertia-vue3';
  import PostCard from '@/Components/PostCard.vue';
  import Pagination from '@/Components/Pagination.vue'
  import CommunityList from '@/Components/CommunityList.vue';
  

  const props =defineProps({
    communities: Object(),
    posts: Object()
  })
  </script>
  
  