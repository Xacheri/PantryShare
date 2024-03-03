<script setup>
import { ref, defineProps } from 'vue';
import PantryRequestCard from '@/components/PantryRequestCard.vue';
const props = defineProps({
    pantryRequests: Array
});
</script>

<template>
    <div>
        <PantryRequestCard v-for="(item, index) in pantryRequests" :key="index"
          :pantry-request="item" :no-button="true"/>
    </div>
</template>

<style scoped>
/* Your component styles go here */
</style>