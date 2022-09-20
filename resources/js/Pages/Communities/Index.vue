<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    
      import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

    import Pagination from '@/Components/Pagination.vue';
      
      
    defineProps({
    communities: Object,
    });
    
    </script>
    
    <template>
        <Head title="Community" />
        
        <BreezeAuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Communities
                </h2>
            </template>
    
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <Link :href="route('communities.create')" type="button" class="bg-gray-700 text-white py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none rounded-md border border-gray-200 hover:bg-gray-500 hover:text-grey-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Add Community</Link>
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Slug
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="community in communities.data" :key="community.slug" class="bg-white border-b text-gray-800">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap text-gray-800">
                                        <Link :href="route('frontend.communities.show', community.slug)" >{{community.name}}</Link>
                                    </th>
                                    <td class="py-4 px-6">
                                        {{community.slug}}
                                    </td>
                                    <td class="py-4 px-6">
                                        <Link :href="route('communities.edit', community.slug)" class="font-medium text-blue-600 text-blue-500 hover:underline">Edit</Link>
                                        <Link method="delete" as="button" :href="route('communities.destroy', community.id)" class="font-medium text-blue-600 text-red-500 hover:underline ml-3">Delete</Link>

                                    </td>
                            
                                
                                </tr>
                        
                            </tbody>
                           
                        </table>                        
                        

                    </div>
                    
                   <div class="m-2 p-2">
                    <Pagination :links="communities.links"/>
                   </div>

                </div>
            </div>
        </BreezeAuthenticatedLayout>
    </template>
    