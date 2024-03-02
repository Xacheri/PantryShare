<template>
    <div class="notification-container">
      <div class="notification-message">
        <h1>Request Fulfilled</h1>
        <p>Your request has been dropped off.</p> 
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue'
  import { useRouter } from 'vue-router'
  
  const orderId = ref('');
  
  const router = useRouter();
  const routeParams = router.currentRoute.value.params;
  
  onMounted(() => {
    window.scrollTo(0, 0);
  });
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
  