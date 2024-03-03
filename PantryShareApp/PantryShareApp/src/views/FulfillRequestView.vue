<script setup>
import { useRouter } from 'vue-router';
import { defineProps } from 'vue';
const router = useRouter();

const props = defineProps({
    foodRequest: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <div>
        <h1>GLAD YOU MADE IT</h1>
    </div>
</template>

<style scoped>
/* Your component styles go here */
</style>