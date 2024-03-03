<template>
  <div class="profile-container">
    <!-- Profile Information -->
    <div class="profile-info">
      <h2>Profile Information</h2>
      <div class="info-item">
        <span class="label">Username:</span>
        <span class="value">{{ userInfo.username }}</span>
      </div>
      <div class="info-item">
        <span class="label">First Name:</span>
        <span class="value">{{ userInfo.firstName }}</span>
      </div>
      <div class="info-item">
        <span class="label">Last Name:</span>
        <span class="value">{{ userInfo.lastName }}</span>
      </div>
      <div class="info-item">
        <span class="label">Email:</span>
        <span class="value">{{ userInfo.email }}</span>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
      <button @click="changePassword">Change Password</button>
      <button @click="editProfile">Edit Profile</button>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const fetchUserInfo = async () => {
  try {
    const response = await fetch('API_ENDPOINT_HERE');
    const data = await response.json();
    userInfo.value = data;
    editedUserInfo.value = { ...data };
  } catch (error) {
    console.error('Error fetching user information:', error);
  }
};

onMounted(fetchUserInfo);
</script>

<style scoped>
.profile-container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
}

.profile-info {
  margin-bottom: 20px;
}

.info-item {
  margin-bottom: 10px;
}

.label {
  font-weight: bold;
  margin-right: 10px;
}

.action-buttons button {
  padding: 10px 20px;
  margin-right: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.action-buttons button:hover {
  background-color: #0056b3;
}
</style>
