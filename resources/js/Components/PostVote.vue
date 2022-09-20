<template>
  <div class="flex flex-col mx-2  mt-6">
   <UpVoteLink :slug="posts.slug" :class="{'text-blue-600' : posts.postVotes[0] && posts.postVotes[0].votes ==1 }" prevent-scroll/>
    <div class="mx-auto  font-bold ">{{posts.votes}}</div>
    <DownVoteLink :slug="posts.slug" :class="{'text-red-600' : posts.postVotes[0] && posts.postVotes[0].votes == -1 }" prevent-scroll/>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import UpVoteLink from './UpVoteLink.vue';
import DownVoteLink from './DownVoteLink.vue';
defineProps({
  posts: Object,
})
</script>

<style>

</style>