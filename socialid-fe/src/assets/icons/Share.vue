<script setup lang="ts">
import { defineProps } from 'vue'

defineProps({width: Number, height: Number})
</script>

<template>
    <svg :width="width" :height="height" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M26.6667 32L31.2749 52.7369C31.5362 53.9131 33.0999 54.1669 33.7198 53.1337L54.7884 18.0193C55.3216 17.1306 54.6815 16 53.6451 16H11.6043C10.3665 16 9.79676 17.5401 10.7366 18.3457L26.6667 32ZM26.6667 32L53.3333 17.3333" stroke="black" stroke-width="5.33333"/>
    </svg>
</template>