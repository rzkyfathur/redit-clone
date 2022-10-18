<template>

    <guest-layout>
        <section class="flex flex-col md:flex-row m-2 p-2 ">
            <div class="w-full md:w-8/12">
                <div class="m-2 p-2 bg-white">
                    <h2 class="font-semibold text-2xl text-black pl-2">
                        <Link :href="route('frontend.communities.show', community.slug)">r/{{community.name}}</Link>
                    </h2>
                </div>
                <div class="m-2 p-2 bg-white">
                    <div class="flex flex-col md:flex-row justify-between m-2">
                       <div>
                        Post by
                        <span class="text-slate-700">{{post.data.username}}</span>
                       </div>
                        <div v-if="$page.props.auth.auth_check && post.data.owner">
                            <Link class="mr-2 font-semibold bg-blue-700 hover:bg-blue-500 text-white px-4 py-2 text-sm rounded-sm" :href="route('communities.post.edit', [community.slug, post.data.slug])">
                                Edit
                            </Link>
                            <Link class="font-light bg-red-700 hover:bg-red-500 text-white px-4 py-2 text-sm rounded-sm" :href="route('communities.post.destroy', [community.slug, post.data.slug])" method="delete" as="button" type="button">
                                Delete
                            </Link>
                        </div>
                    </div>
                   <div class="p-2">
                    <h1 class="font-semibold text-black text-3xl">{{post.data.title}}</h1>
                    <p class="text-slate-700">{{post.data.description}}</p>
                    <a :href="post.data.url" class="font-semibold text-sm text-blue-700 hover:text-blue-400">{{post.data.url}}</a>
                   </div>
                </div>
            </div>
            <div class="w-full md:w-4/12 p-4">
                <div class="m-2 p-2 bg-slate-500 text-white">
                    Latest comment
                </div>
            </div>
        </section>
    </guest-layout>
</template>

<script setup>
import GuestLayout from "@/Layouts/Guest.vue";
import { Link } from "@inertiajs/inertia-vue3";
import PostCard from "@/Components/PostCard.vue";
import Pagination from "@/Components/Pagination.vue";

defineProps({
    community: Object,
    post: Object,
})
</script>

