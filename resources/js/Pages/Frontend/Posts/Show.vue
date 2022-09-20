<template>
    <guest-layout>
      <section class="flex flex-col md:flex-row m-2 p-2 ">
        <div class="w-full  md:w-8/12">
            <div class="m-2 p-2 bg-white">
                <h2 class="font-semibold text-2xl text-black">
                    <Link :href="(route('frontend.communities.show', community.slug))">
                    r/{{community.name}}
                    </Link>
                </h2>
            </div>
            <div class="flex m-2 p-2 bg-white">
              <div class="">
                <!-- <PostVote :posts="post.data"/> -->
              </div>
             <div class="">
              <div class="flex flex-col md:flex-row justify-between m-2">
                    <span class="ml-2 text-small text-slate-400">Posted by <span class="text-slate-700">{{post.data.username}}</span></span>
                    <div class="" v-if="$page.props.auth.auth_check">
                        <Link v-if="can_update" :href="route('communities.posts.edit',[community.slug, post.data.slug])" class="font-semibold bg-blue-500 hover:bg-blue-700 rounded-md text-white px-4 py-2 mr-2" >Edit</Link> <!---:href="route('communities.post.edit',[community.slug, post.data.slug])"-->
                        <Link v-if="can_delete" :href="route('communities.posts.destroy',[community.slug, post.data.slug])" method="delete" as="button" type="button"   class="font-semibold bg-red-500 hover:bg-red-700 rounded-md text-white px-4 py-2">Delete</Link> <!---:href="route('communities.post.destroy', [community.slug, post.data.slug])"-->
                    </div>
                </div>
                <div class="p-2">
                    <h2 class="font-semibold text-3xl text-black">
                    {{post.data.title}}
                </h2>
                <p class="text-slate-700 my-2">{{post.data.description}}</p>
                <a :href="post.data.url" class="font-semibold text-blue-500 text-sm hover:text-blue-300">{{post.data.url}}</a>
                <div v-for="(comment, index) in post.data.comments" :key="index" class="bg-white p-4 antialiased flex max-w-lg">
                  <img class="rounded-full h-8 w-8 mr-2 mt-1 " src="https://picsum.photos/id/1027/200/200"/>
                  <div>
                    <div class=" border border-gray-500 rounded-3xl px-4 pt-2 pb-2.5">
                      <div class="font-semibold text-sm leading-relaxed">{{comment.username}}</div>
                      <div class="text-normal leading-snug md:leading-normal">
                        {{comment.content}}
                      </div>
                    </div>

                  </div>
                </div>
                <form v-if="$page.props.auth.auth_check" class="w-full  bg-white rounded-lg px-4 pt-2" @submit.prevent="submit">
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                      <div class="w-full md:w-full px-3 mb-2 mt-2">
                          <textarea v-model="form.content" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
                      </div>
                      <div class="w-full md:w-full flex items-start md:w-full px-3">
                          <div class="-mr-1">
                            <input type='submit' class="bg-white text-gray-700 font-medium text-blue-700 py-1 px-4 border border-blue-400 rounded-full tracking-wide mr-1 hover:bg-blue-700 hover:text-white" value='Post Comment'>
                          </div>
                      </div>
                    </div>
                </form>
              </div>
             </div>
            </div>
            
          <div class="mt-4 p-2">
            <!-- <Pagination :links="posts.meta.links"/> -->
          </div>
        </div>
        <div class="w-full md:w-4/12">
          
            <CommunityPostList :posts="posts.data" :community="community">
              <template #title>
                Popular Posts
              </template>
            </CommunityPostList>
          
        </div>
      </section>
    </guest-layout>
  </template>
  
  <script setup>
  
  import GuestLayout from '@/Layouts/Guest.vue';
  import {Link } from '@inertiajs/inertia-vue3';
  import PostCard from '@/Components/PostCard.vue';
  import Pagination from '@/Components/Pagination.vue'
  import { useForm } from '@inertiajs/inertia-vue3';
import PostVote from '@/Components/PostVote.vue';
import CommunityPostList from '@/Components/CommunityPostList.vue';
  
  
  const props = defineProps({
    community: Object(),
    post: Object(),
    posts: Object(),
    can_update: Boolean,
    can_delete: Boolean,
  })

  const form = useForm({
      content:""
      
  });
  //   const submit = () => {
  //     form.post(
  //       route("frontend.posts.comments", [props.community.slug, props.posts.data.slug]))
  //  };

  const submit = () => {
   
  form.post(
    route("frontend.post.comments", [
      props.community.slug,
      props.post.data.slug,
    ]),
    {
      onSuccess: () => form.reset("content"),
    }
  );
};
  
  </script>
  
  