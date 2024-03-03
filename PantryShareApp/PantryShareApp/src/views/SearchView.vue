<script setup>
import { ref } from 'vue'
import TestDataClass from '@/classes/TestDataClass';
import { onMounted } from 'vue';
import { useRouter } from 'vue-router';
import PantryRequestCard from '@/components/PantryRequestCard.vue';

const searchQuery = ref('');
const searchResults = ref([]);
const serviceRequests = ref([]);
const router = useRouter();

const getServiceRequests = function () {
  console.log('Getting pantry requests');
  // Call a REST API to get the pantry requests
  try {
    serviceRequests.value = TestDataClass.getLocalPantryRequests();
    console.log('Success:', searchRequests.value);
  } catch (error) {
    console.error('Error:', error);
  }
}

const searchRequests = () => {
  const keyword = searchQuery.value.toLowerCase().trim();
  // Filter the user requests based on the keyword
  const filteredRequests = serviceRequests.value.filter(request => {
    const food = request.order.orderItems;
    const foodJson = JSON.stringify(food);
    return (
      foodJson.toLowerCase().includes(keyword) ||
      request.order.PickupLocation.toLowerCase().includes(keyword) ||
      request.user.Location.toString().includes(keyword)
    );
  });

  // Update the list of search results
  searchResults.value = filteredRequests;
};
const fulfillRequest = function () {
  console.log('Fulfilling request');
  router.push('/fulfillrequest');
}

onMounted(() => {
  getServiceRequests();
});
</script>

<template>
  <div class="search-container d-flex flex-column w-100 align-items-center">
    <div>
      <label for="searchQuery" class="h6">Search for a request</label><br>
      <input type="text" v-model="searchQuery" placeholder="Enter search keyword...">
      <button @click="searchRequests">Search</button>
    </div>
    <div>
      <h2 v-if="searchResults.length > 0">Results</h2>
      <span v-else>No results found</span>
      <PantryRequestCard v-for="(item, index) in searchResults" :key="index"
      :pantry-request="item" @fulfill-request="fulfillRequest"/>
    </div>
  </div>
</template>

<style scoped>
.search-container {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

input[type="text"] {
  flex: 1;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  margin-left: 10px;
  padding: 8px 12px;
  border: 1px solid #ccc;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #f0f0f0;
}
</style>
