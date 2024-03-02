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
    <div>
        <h1>Register</h1>
        <form>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" v-model="username">
            
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" v-model="fName">
            
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" v-model="lName">
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" v-model="email">
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" v-model="password">
            
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword" v-model="confirmPassword">
            
            <button @click.prevent="register">Register</button>
        </form>
    </div>
</template>

<style scoped>

</style>