<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
defineProps({
    posts: Array
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
        </template>

        <div class="py-12 flex justify-center grid">
            <div class="flex justify-center">
                <Link href="/posts/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create Post
                </Link>
            </div>
            <div>
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Id</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Created at</th>
                            <th class="px-4 py-2">Updated at</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="post in posts" :key="post.id">
                            <td class="pr-10 px-4 py-2">{{ post.id }}</td>
                            <td class="pr-10 px-4 py-2">{{ post.title }}</td>
                            <td class="pr-10 px-4 py-2">{{ post.created_at }}</td>
                            <td class="pr-10 px-4 py-2">{{ post.updated_at }}</td>
                            <td class="pr-10 px-4 py-2">
                                <Link :href="'/posts/' + post.id + '/edit'"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-3 rounded">
                                Edit
                                </Link>
                                <Link :href="'/posts/' + post.id + '/delete'"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>