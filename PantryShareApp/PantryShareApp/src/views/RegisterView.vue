<template>
    <div class="container mt-5">
        <h1>Register</h1>
        <form>
            <div class="mb-3">
                <label for="username">Username</label>
                <div><input type="text" id="username" name="username" v-model="username"></div>
            </div>
            
            <div class="mb-3">
                <label for="firstName">First Name</label>
                <div><input type="text" id="firstName" name="firstName" v-model="fName"></div>
            </div>

            <div class="mb-3">
                <label for="lastName">Last Name</label>
                <div><input type="text" id="lastName" name="lastName" v-model="lName"></div>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <div><input type="email" id="email" name="email" v-model="email"></div>
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <div><input type="password" id="password" name="password" v-model="password"></div>
            </div>

            <div class="mb-3">
                <label for="confirmPassword">Confirm Password</label>
                <div><input type="password" id="confirmPassword" name="confirmPassword" v-model="confirmPassword"></div>
            </div>

            <div class="mb-3">
                <button @click.prevent="register" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
    
</template>

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

<style scoped>

</style>