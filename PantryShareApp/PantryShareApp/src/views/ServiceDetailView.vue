<script setup>
</script>

<template>
    <div class="request-details-container">
      <!-- Request Details -->
      <div class="request-details">
        <h2>Request Details</h2>
        <p><strong>Location:</strong> {{ requestLocation }}</p>
        <p><strong>Status:</strong> {{ requestStatus }}</p>
      </div>
  
      <!-- Items Requested -->
      <div class="items-requested">
        <h2>Items Requested</h2>
        <div v-for="(item, index) in requestedItems" :key="index" class="item">
          <input type="checkbox" v-model="selectedItems[index]">
          <label>{{ item }}</label>
        </div>
      </div>
  
      <!-- Fulfilling Request Button -->
      <button @click="fulfillRequest">Fulfill Request</button>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
  const requestLocation = ref("Your request location");
  const requestStatus = ref("Pending"); // Assuming the status is initially pending
  const requestedItems = ref(["Item 1", "Item 2", "Item 3"]); // Sample requested items
  const selectedItems = ref(Array(requestedItems.value.length).fill(false)); // Initialize all items as unchecked
  
  const fulfillRequest = () => {
    // Logic to handle fulfilling the request
  };
  </script>
  
  <style scoped>
  .request-details-container {
    max-width: 600px;
    margin: 0 auto;
  }
  
  .request-details, .items-requested {
    margin-bottom: 20px;
  }
  
  .item {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
  }
  
  label {
    margin-left: 10px;
  }
  
  button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  
  button:hover {
    background-color: #0056b3;
  }
  </style>
  

<style scoped>
/* Your component styles go here */
</style>