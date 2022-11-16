<script setup lang="ts">
import { defineProps } from 'vue'

defineProps({width: Number, height: Number})
</script>

<template>
    <svg :width="width" :height="height" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 50.0124V10.6667H48V50.0124L33.9623 37.3784C32.8467 36.3744 31.1533 36.3744 30.0377 37.3784C30.0377 37.3784 30.0377 37.3784 30.0377 37.3785L16 50.0124Z" stroke="black" stroke-width="5.33333"/>
    </svg>
</template>