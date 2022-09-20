<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import BreezeButton from '@/Components/Button.vue';
      import BreezeInput from '@/Components/Input.vue';
      import BreezeInputError from '@/Components/InputError.vue';
      import BreezeLabel from '@/Components/Label.vue';
      import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

      const props = defineProps({
        community: Object,
        post: Object
      })
  
        const form = useForm({
          title: props.post?.title,
          description: props.post?.description,
          url: props.post?.url,
        
      });
  
      const submit = () => {
          form.put(route("communities.posts.update", [props.community.slug, props.post.slug]));
  };
    </script>
    
    <template>
        <Head title="Community" />
    
        <BreezeAuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Create Posts for {{community.name}}
                </h2>
            </template>
    
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="max-w-md mx-auto bg-white m-2 p-6" style="max-width: 500px;">
                    <form @submit.prevent="submit">
              <div>
                  <BreezeLabel for="title" value="Title" />
                  <BreezeInput id="title" type="text" class="mt-1 block w-full" v-model="form.title"  autofocus autocomplete="title" />
                  <BreezeInputError class="mt-2" :message="form.errors.title" />
              </div>
              <div>
                  <BreezeLabel for="name" value="Description" />
                  <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description"  autofocus autocomplete="description" />
                  <BreezeInputError class="mt-2" :message="form.errors.description" />
              </div>
              <div>
                  <BreezeLabel for="Url" value="Url" />
                  <BreezeInput id="Url" type="text" class="mt-1 block w-full" v-model="form.url"  autofocus autocomplete="url" />
                  <BreezeInputError class="mt-2" :message="form.errors.url" />
              </div>
              <div class="flex items-center justify-end mt-4">
                  <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                      Store
                  </BreezeButton>
              </div>
          </form>
                  </div>
                </div>
            </div>
        </BreezeAuthenticatedLayout>
    </template>
    