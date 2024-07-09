<script setup>
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';

    const props = defineProps({
        post: Object,
    });

    const form = useForm({
        id: props.post.id,
    })

    function submit() {
        form.delete(`/posts/${props.post.id}`);
    }
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Delete post</h2>
        </template>

        <div class="py-12">
            <div class="mt-5 max-w-lg mx-auto p-4 bg-white shadow-md rounded-lg">
            <form @submit.prevent="submit()">
                <div class="mb-4 flex justify-center items-center">
                    <label for="title" class="block text-sm font-medium text-gray-700">Are you sure you want to delete it ?</label>
                </div>
                <div class="flex justify-center items-center ">
                    <button
                        type="submit"
                        class="inline-flex justify-center bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-sm font-medium mx-5"
                    >
                        Delete
                    </button>
                    <Link :href="'/posts'" class="inline-flex justify-center bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded text-sm font-medium">Go back</Link>
                </div>
            </form>
        </div>
        </div>
    </AppLayout>
</template>