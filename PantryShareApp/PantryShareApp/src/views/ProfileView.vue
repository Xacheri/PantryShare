<template>
  <div class="profile-container mt-5">
    <div class="profile-info d-flex flex-column">
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

    <div class="action-buttons">
      <LiftedButton text="Change Password" color="blue" @custom-click="changePassword"/>
      <LiftedButton text="Edit Profile" color="yellow"@custom-click="editProfile"/>
      <LiftedButton text="Logout" color="red"/>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
import LiftedButton from '@/components/LiftedButton.vue';

export default {
    components: {
        LiftedButton // Add the LiftedButton component to the components section
    },
    setup() {

        const userInfo = ref({
            username: 'john_doe',
            firstName: 'John',
            lastName: 'Doe',
            email: 'john@example.com'
        });

        // Functions for change password and edit profile remain non-working for prototype phase
        const changePassword = () => {
            console.log('Changing password...');
        };

        const editProfile = () => {
            console.log('Editing profile...');
        };



        return { userInfo, changePassword, editProfile };
    }
}
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

.action-buttons{
    display: flex;
}
</style>

