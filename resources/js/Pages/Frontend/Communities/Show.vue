<template>

    <guest-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                r{{community.name}}
            </h2>
            <div class="flex justify-end m-2 p-2">
                <Link v-if="$page.props.auth.auth_check" :href="route('communities.post.create', community.slug)"
                    class="px-3 py-4 rounded bg-indigo-500 text-white hover:bg-indigo-700">Create post</Link>
            </div>
        </template>

        <section class="m-2 p-2 flex md:flex-row">
           <div class="w-8/12">
            <PostCard v-for="post in posts.data" :post="post" :community="community.slug" :key="post.id" />
            <div class="mt-2 p-4">
                <Pagination :links="posts.meta.links"/>
            </div>
           </div>
           <div class="w-4/12 p-4">
           <div class="m-2 p-2 bg-slate-500 text-white">
                <h2>Latest Communities</h2>
           </div>
           </div>
        </section>

    </guest-layout>
</template>

<script setup>
import GuestLayout from "@/Layouts/Guest.vue";
import {Link} from "@inertiajs/inertia-vue3";
import PostCard from "@/Components/PostCard.vue";
import Pagination from "@/Components/Pagination.vue";

defineProps({
    community: Object,
    posts: Object,
})
</script>

