<script setup>
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';

    const props = defineProps({
        post: Object,
    });

    const form = useForm({
        id: props.post.id,
        title: props.post.title,
    })

    function submit() {
        form.put(`/posts/${props.post.id}`);
    }

</script>


<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Update Post</h2>
        </template>

        <div class="mt-5 max-w-lg mx-auto p-4 bg-white shadow-md rounded-lg">
            <form @submit.prevent="submit()">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input
                        type="text"
                        id="title"
                        v-model="form.title"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                </div>
                <div>
                <button
                    type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Update
                </button>
                </div>
            </form>
        </div>
    </AppLayout>    
</template>