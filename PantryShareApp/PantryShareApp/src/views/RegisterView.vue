<script setup>
    import { ref } from 'vue'

    const username = ref('');
    const fName = ref('');
    const lName = ref('');
    const email = ref('');
    const password = ref('');
    const confirmPassword = ref('');

    const register = function() {
        console.log('Username: ', username.value);
        console.log('First Name: ', fName.value);
        console.log('Last Name: ', lName.value);
        console.log('Email: ', email.value);
        console.log('Password: ', password.value);
        console.log('Confirmed Password: ', confirmPassword.value);
        
        // try {
        //     const response = await fetch('http://localhost/api/register', {
        //         method: 'POST', // Use POST method for registration
        //         headers: {
        //             'Content-Type': 'application/json'
        //         },
        //         body: JSON.stringify({
        //             username: username.value,
        //             fName: fName.value,
        //             lName: lName.value,
        //             email: email.value,
        //             password: password.value,
        //             confirmedPassword: confirmedPassword.value
        //         })
        //     });

        //     if (response.ok) {
        //         const data = await response.json();
        //         console.log('Registration successful:', data);
        //         // do stuff
        //     } else {
        //         const errorMessage = await response.text();
        //         console.error('Registration failed:', errorMessage);
        //     }
        // } catch (error) {
        //     console.error('Error:', error);
        // }
    }
</script>

<template>
    <div class="d-flex flex-column align-items-center" class="container mt-5">
      <h1 class="mb-4">Register</h1>
      <form class="d-flex flex-column align-items-center" @submit.prevent="register" class="needs-validation">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" id="username" class="form-control" v-model="username" required>
        </div>
        <div class="mb-3">
          <label for="firstName" class="form-label">First Name</label>
          <input type="text" id="firstName" class="form-control" v-model="fName" required>
        </div>
        <div class="mb-3">
          <label for="lastName" class="form-label">Last Name</label>
          <input type="text" id="lastName" class="form-control" v-model="lName" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" class="form-control" v-model="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" id="password" class="form-control" v-model="password" required>
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Confirm Password</label>
          <input type="password" id="confirmPassword" class="form-control" v-model="confirmPassword" required>
        </div>
        <button type="submit" class="btn btn-primary d-block mx-auto mt-3">Register</button>
      </form>
    </div>
  </template>

<style scoped>

</style>