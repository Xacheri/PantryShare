<!-- <script setup>
import { ref } from 'vue'

// register props
const props = defineProps({
    pantryRequest: {
        type: Object,
        required: true
    }
}
)
</script>

<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-info">{{ pantryRequest.text }}</h5>
            <p class="card-text text-secondary">Quantity: {{ pantryRequest.quantity }}</p>
        </div>
    </div>
</template>

<style scoped>
/* Your component's CSS styles go here */
</style> -->

<template>
  <div class="service-request-container">
    <div class="service-request-tile" v-for="(request, index) in paginatedRequests" :key="index">
      <h3>{{ request.serviceName }}</h3>
      <p><strong>Description:</strong> {{ request.serviceDescription }}</p>
      <p><strong>Category:</strong> {{ request.serviceCategory }}</p>
      <p><strong>Location:</strong> {{ request.serviceLocation }}</p>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'

const serviceRequests = ref([]);

// FOR TESTING UI
const dummyData = [
  {
    id: 1,
    serviceName: "Service Request 1",
    serviceDescription: "Description of service request 1",
    serviceCategory: "Category 1",
    serviceLocation: "Location 1"
  },
  {
    id: 2,
    serviceName: "Service Request 2",
    serviceDescription: "Description of service request 2",
    serviceCategory: "Category 2",
    serviceLocation: "Location 2"
  },
  {
    id: 3,
    serviceName: "Service Request 3",
    serviceDescription: "Description of service request 3",
    serviceCategory: "Category 3",
    serviceLocation: "Location 3"
  },
  {
    id: 4,
    serviceName: "Service Request 4",
    serviceDescription: "Description of service request 4",
    serviceCategory: "Category 4",
    serviceLocation: "Location 4"
  }
];

onMounted(() => {
  serviceRequests.value = dummyData; // TEST DATA - REMOVE
});

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
  overflow-y: auto; 
}

.service-request-tile {
  width: 45%;
  margin-bottom: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>
