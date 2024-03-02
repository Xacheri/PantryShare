<template>
  <div class="search-container">
    <input type="text" v-model="searchQuery" placeholder="Enter search keyword...">
    <button @click="searchRequests">Search</button>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const searchQuery = ref('');

const searchRequests = () => {
  const keyword = searchQuery.value.toLowerCase().trim();

  // Filter the user requests based on the keyword
  const filteredRequests = serviceRequests.value.filter(request => {
    return (
      request.serviceName.toLowerCase().includes(keyword) ||
      request.serviceDescription.toLowerCase().includes(keyword) ||
      request.serviceCategory.toLowerCase().includes(keyword) ||
      request.serviceLocation.toLowerCase().includes(keyword)
    );
  });

  // Update the list of search results
  searchResults.value = filteredRequests;
};

</script>

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
