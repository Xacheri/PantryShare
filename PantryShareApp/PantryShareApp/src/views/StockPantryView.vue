<script setup>
import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router';
import PantryRequestCard from '@/components/PantryRequestCard.vue'
import TestDataClass from '@/classes/TestDataClass'

const pantryRequests = ref([]);

const getPantryRequests = function () {
  console.log('Getting pantry requests');
  // Call a REST API to get the pantry requests
  try {
    pantryRequests.value = TestDataClass.getLocalPantryRequests();
    console.log('Success:', pantryRequests.value);
  } catch (error) {
    console.error('Error:', error);
  }
}

const router = useRouter();
const fulfillRequest = function () {
  console.log('Fulfilling request');
  router.push('/fulfillrequest');
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
          :pantry-request="item" @fulfill-request="fulfillRequest"/>
      </div>
      <div class="col-6">
        <PantryRequestCard v-for="(item, index) in pantryRequests.slice(pantryRequests.length / 2).filter(i => i.order.Status == 'Open')" :key="index"
          :pantry-request="item" @fulfill-request="fulfillRequest"/>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Your component's CSS styles go here */
</style>