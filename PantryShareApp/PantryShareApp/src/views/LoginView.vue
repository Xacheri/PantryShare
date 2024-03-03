<script setup>
/**
 * This is an example login form
 * I made to show off some basic Vue 3 features
 * Like the ref function and the @click event and .prevent and v-model
 * And demonstrate that we dont "submit" the form
 * We call a REST API to login
 */

import { ref } from 'vue'

// these variables are reactive (thats why we use ref)
// they are stateful (they can change) and are bound to the input fields
const username = ref('');
const password = ref('');

// this function is called when the form is submitted
const login = async function(){
    // we can access the values of the input fields using the .value property
    console.log('Username:', username.value);
    console.log('Password:', password.value);
    // we can call a REST API to login
    // using the fetch function
    try {
        const response = await fetch('http://localhost/api/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                username: username.value,
                password: password.value
            })
        });

        const data = await response.json();
        console.log('Success:', data);
        // do stuff with the data (like redirect to another page)
    } catch (error) {
        console.error('Error:', error);
    }
}
</script>

<template>
    <div class="container mt-5">
      <h1>Login</h1>
      <form>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" v-model="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" v-model="password">
        </div>
        <button @click.prevent="login" class="btn btn-primary d-block mx-auto mt-3">Login</button>

      </form>
    </div>
  </template>
  
<style scoped>

</style>