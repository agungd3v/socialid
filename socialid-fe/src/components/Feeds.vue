<script setup lang="ts">
import { ref } from 'vue'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
import 'vue3-carousel/dist/carousel.css'

const contents = ref([
    {
        profile: '/static/profile.png',
        name: 'Agung Ardiyanto',
        posts: [
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
        <div class="bg-red-500">
            <Carousel :items-to-show="1.5">
                <Slide v-for="(post, i) in content.posts" :key="i">
                    <img :src="post" alt="post" class="object-cover">
                </Slide>
                <template #addons>
                    <!-- <Navigation /> -->
                    <Pagination />
                </template>
            </Carousel>
        </div>
    </div>
</template>