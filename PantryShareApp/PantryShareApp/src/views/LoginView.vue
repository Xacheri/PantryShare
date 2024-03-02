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
    <div>
        <h1>Login</h1>
        <!-- We dont actually use post 
            since we call a REST API to login
            and we dont want to refresh the page
         -->
        <form>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" v-model="username">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" v-model="password">
            <!-- Use the @click.prevent to bind a click event AND prevent default form behavior (reloading the page) -->
            <button @click.prevent="login">Login</button>
        </form>
    </div>
</template>
<style scoped>

</style>