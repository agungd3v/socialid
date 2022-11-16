<script setup lang="ts">
import { defineProps } from 'vue'

defineProps({width: Number, height: Number})
</script>

<template>
    <svg :width="width" :height="height" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="17" cy="17" r="16" stroke="#BBB8B8" stroke-width="1.6"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2 17.8V26.6H17.8V17.8H26.6V16.2H17.8V7.40002H16.2V16.2H7.40002V17.8H16.2Z" fill="#BBB8B8"/>
    </svg>
</template>