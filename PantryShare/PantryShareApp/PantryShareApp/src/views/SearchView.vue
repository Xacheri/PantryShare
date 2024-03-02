<template>
    <div class="service-request-container">
      <div v-for="(request, index) in paginatedRequests" :key="index" class="service-request-tile">
        <h3>{{ request.serviceName }}</h3>
        <p><strong>Description:</strong> {{ request.serviceDescription }}</p>
        <p><strong>Category:</strong> {{ request.serviceCategory }}</p>
        <p><strong>Location:</strong> {{ request.serviceLocation }}</p>
      </div>
    </div>
    <!-- FOR UI TESTING, REMOVE ONCE API IS CONNECTED -->
    <button @click="addServiceRequest">Add Service Request</button>
  </template>
  
  <script setup>
  import { ref, computed } from 'vue'
  
  const serviceRequests = ref([]);
  
  // FOR TESTING REMOVE AFTER API CONNECTION
  const testData = [
    {
      id: 1,
      serviceName: "Test Service 1",
      serviceDescription: "Description of test service 1",
      serviceCategory: "Category 1",
      serviceLocation: "Location 1"
    },
    {
      id: 2,
      serviceName: "Test Service 2",
      serviceDescription: "Description of test service 2",
      serviceCategory: "Category 2",
      serviceLocation: "Location 2"
    }
  ];
  // REMOVE ABOVE CODE AFTER API CONNECTION
  
  // Function to add test data
//   const addTestData = () => {
//     serviceRequests.value = [...testData];
//   }
  
  // Adds new request
  const addServiceRequest = function() {
    const newRequest = {
      id: serviceRequests.value.length + 1,
      serviceName: "New Service Request",
      serviceDescription: "Description of new service request",
      serviceCategory: "Category",
      serviceLocation: "Location"
    };
    serviceRequests.value.push(newRequest);
  }
  
  // Paginate requests
  const paginatedRequests = computed(() => {
    const pageSize = 4; 
    const currentPage = 1; 
    const startIndex = (currentPage - 1) * pageSize;
    const endIndex = currentPage * pageSize;
    return serviceRequests.value.slice(startIndex, endIndex);
  });
  
  </script>
  
  <style scoped>
  .service-request-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
  }
  
  .service-request-tile {
    width: 45%;
    margin-bottom: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  
  button {
    margin-top: 20px;
  }
  </style>
  