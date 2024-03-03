<script setup>
import { onMounted, ref } from 'vue'
import PantryRequestCard from '@/components/PantryRequestCard.vue'
import TestDataClass from '@/classes/TestDataClass'

const pantryRequests = ref([]);

const getPantryRequests = function () {
  console.log('Getting pantry requests');
  // Call a REST API to get the pantry requests
  try {
    pantryRequests.value = TestDataClass.getLocalPantryRequests();
    console.log('Success:', pantryRequests.value);
    // do stuff with the data (like update the pantryRequests variable)
  } catch (error) {
    console.error('Error:', error);
  }
}

const doublePantryRequests = function () {
  pantryRequests.value = pantryRequests.value.concat(pantryRequests.value);
}

onMounted(() => {
  getPantryRequests();
});
</script>

<template>
  <div id="pantry-stock-container">
    <h1>Current Pantry Requests</h1>
    <div class="row">
      <div class="col-6">
        <PantryRequestCard v-for="(item, index) in pantryRequests.slice(0, pantryRequests.length / 2)" :key="index"
          :pantry-request="item" />
      </div>
      <div class="col-6">
        <PantryRequestCard v-for="(item, index) in pantryRequests.slice(pantryRequests.length / 2)" :key="index"
          :pantry-request="item" />
      </div>
    </div>
    <button @click="doublePantryRequests">Double Pantry Requests</button>
  </div>
</template>

<style scoped>
/* Your component's CSS styles go here */
</style>