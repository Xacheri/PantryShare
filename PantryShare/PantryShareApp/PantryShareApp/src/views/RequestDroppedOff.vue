<template>
    <div class="notification-container">
      <div class="notification-message">
        <h1>Request Dropped Off</h1>
        <p>Thank you for your contribution. The user has been notified.</p>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
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
  