<template>
  <div class="request-details-container">

    <div class="request-details">
      <h2>Request Details</h2>
      <p><strong>Location:</strong> {{ requestLocation }}</p>
      <p><strong>Status:</strong> {{ requestStatus }}</p>
    </div>

    <div class="items-requested">
      <h2>Items Requested</h2>
      <div v-for="(item, index) in uncheckedItems" :key="index" class="item">
        <input type="checkbox" v-model="selectedItems[index]">
        <label>{{ item }}</label>
      </div>
      <div v-for="(item, index) in checkedItems" :key="index" class="item checked">
        <span class="checkmark">&#10003;</span>
        <label>{{ item }}</label>
      </div>
    </div>

    <button @click="fulfillRequest">Fulfill Request</button>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'

const requestLocation = ref("Your request location");
const requestStatus = ref("Pending"); // Assuming the status is initially pending
const requestedItems = ref(["Item 1", "Item 2", "Item 3"]); // Sample requested items
const selectedItems = ref(Array(requestedItems.value.length).fill(false)); // Initialize all items as unchecked
const router = useRouter();

const checkedItems = computed(() => {
  return requestedItems.value.filter((item, index) => selectedItems.value[index]);
});

const uncheckedItems = computed(() => {
  return requestedItems.value.filter((item, index) => !selectedItems.value[index]);
});

const fulfillRequest = () => {
  showNotification();

  setTimeout(() => {
    router.push({ name: 'Search' });
  }, 2000);
};

const showNotification = () => {
  alert("User has been notified. Thank you for your contribution!");
};
</script>

<style scoped>
.request-details-container {
  max-width: 600px;
  margin: 0 auto;
}

.request-details,
.items-requested {
  margin-bottom: 20px;
}

.item {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

.checked .checkmark {
  color: green;
}

.checkmark {
  margin-right: 5px;
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
