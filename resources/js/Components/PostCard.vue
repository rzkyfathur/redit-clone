<template>
    <div class="
        mt-4
        max-w-4xl
        flex
        bg-white
        rounded-md
        border border-gray-200
        shadow-md

    ">
        <div class="mr-3">
            <!-- <PostVote :post="post" /> -->
        </div>
        <div>
            <div class="flex m-2 p-2 text-sm">
                <span class="font-semibold mr-3">r{{community}}</span>
                <div class="flex">
                    Posted by
                    <span class="font-semibold mx-1">Post {{post.username}}</span>

                </div>
            </div>
            <div class="m-2 p-2">
                <Link :href="route('frontend.posts.show', [community, post.slug])">
                <h5 class="
                            mb-2
                            text-2xl
                            font-bold
                            tracking-tight
                            text-gray-900
                            hover:text-indigo-700
                          ">
                    {{post.title}}
                </h5>
                </Link>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{post.description}}
                </p>
                <div class="flex m-2 p-2">
                    <p class="mr-4 p-2">Comments</p>
                    <Link :href="route('frontend.posts.show', [community, post.slug])" class="
                            inline-flex
                            items-center
                            py-2
                            px-3
                            text-sm
                            font-medium
                            text-center text-white
                            bg-blue-700
                            rounded-lg
                            hover:bg-blue-800
                            focus:ring-4 focus:outline-none focus:ring-blue-300
                            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                          ">
                    Read more
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3'
defineProps({
    post: Object,
    community: String,
});
</script>

