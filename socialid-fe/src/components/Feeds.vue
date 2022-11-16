<script setup lang="ts">
import { ref } from 'vue'
import { Likes, Comments, Share, Bookmark, Addplus } from '@/assets/icons'
import { Carousel, Slide, Pagination } from 'vue3-carousel'
import 'vue3-carousel/dist/carousel.css'

const contents = ref([
    {
        profile: '/static/profile.png',
        name: 'Agung Ardiyanto',
        posts: [
            '/static/postimage.png',
            '/static/postimage.png'
        ],
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, suscipit ut! Quae possimus pariatur est?'
    }
])
</script>

<template>
    <div v-if="contents.length > 0" v-for="(content, i) in contents" :key="i" class="flex flex-col justify-center bg-white">
        <div class="flex gap-3 items-center w-full px-3 py-2">
            <div class="flex items-center gap-2 flex-1">
                <img :src="content.profile" class="w-12 h-12 cursor-pointer" alt="profile">
                <div class="w-full font-semibold">{{ content.name }}</div>
            </div>
            <div class="flex items-center justify-center w-8 h-12 cursor-pointer">
                <img src="/static/dot.png" class="w-1.5" alt="setting-feed">
            </div>
        </div>
        <Carousel :items-to-show="1.5">
            <Slide v-for="(post, i) in content.posts" :key="i">
                <img :src="post" alt="post" class="object-cover">
            </Slide>
            <template #addons>
                <Pagination />
            </template>
        </Carousel>
        <div class="flex items-center px-5 pt-3">
            <div class="flex items-center gap-2">
                <Likes :width="26" :height="26" />
                <Comments :width="26" :height="26" />
                <Share :width="26" :height="26" />
            </div>
            <div class="flex-1">
                <div class="flex items-center justify-end">
                    <Bookmark :width="26" :height="26" />
                </div>
            </div>
        </div>
        <div class="px-5 pt-4 pb-2">
            <div class="font-semibold">12,542 Likes</div>
            <div class="text-sm">{{ content.description }}</div>
        </div>
        <div class="px-5 pb-4">
            <span class="text-gray-300 text-sm">View all 123 comments</span>
            <div class="flex items-center gap-3 mt-1">
                <img :src="content.profile" alt="profile" class="w-9 h-9">
                <div class="h-9 flex-1">
                    <input class="text-sm h-9 w-full" type="text" placeholder="Add a comment...">
                </div>
                <Addplus :width="26" :height="26" />
            </div>
        </div>
    </div>
</template>

<style>
    .carousel__pagination {
        position: absolute;
        margin: 0;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
    }
    .carousel__pagination-button::after {
        background: #FFF;
    }
    .carousel__pagination-button.carousel__pagination-button--active::after {
        background: #059AFE;
    }
</style>