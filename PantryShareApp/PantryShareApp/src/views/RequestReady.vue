<template>
  <div class="notification-container" v-if="showNotification">
    <div class="notification-message">
      <h1>Request Fulfilled</h1>
      <p>Your request has been dropped off and is ready for pickup!</p>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const showNotification = ref(false);
const router = useRouter();

const fulfillRequest = () => {
  // Logic to fulfill the request
  
  // Show the notification message
  showNotification.value = true;

  // Redirect to the 'SearchVue.vue' page after 2 seconds
  setTimeout(() => {
    router.push({ name: 'Search' });
  }, 2000);
};
</script>

<style scoped>
.notification-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.notification-message {
  text-align: center;
}

.notification-message h1 {
  font-size: 2.5rem;
  margin-bottom: 20px;
}

.notification-message p {
  font-size: 1.2rem;
}
</style>
