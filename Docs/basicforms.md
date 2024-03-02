# Basic Forms in Vue.js
Forms in a Vue.js SPA (Single-Page Application) work a little differently than forms in vanilla web development.
Beyond the syntax-magic of Vue.js, we also do not submit the form like normal, instead we call a REST API with the data
and react based on the results of the request.

**KNOW THAT document.GetElementById() IS NOT THE "Vue Way" to do things! Create ref() variables and use v-model instead if you want to access values in JS, and use v-bind
to adjust the DOM properties**

| Keyword/Feature | Usage |
|----------|----------|
| ref()  | Creates a reactive variable. Does what the data() function does in the Options API|
| @click.prevent | Adds a click event AND prevents the default action \(submitting a form) |
| v-model | Placed on an element, tells it "when the value here changes, update the reactive variable as well" |
| fetch() | JS Built-In Asynchronous request handler, feel free to install and use axios if you prefer |

Review the code below to understand how to collect data, and submit it to an API, using
Step 1. Set up reactive variables for the input fields
Step 2. V-Model the fields to the variables
Step 3. Write a function (as a const variable) to handle the data (accessing reactive data through the .value mechanism)
Step 4. Use @click.prevent to assign the function to the submit button
Step 5. Do what you want with the data you get back from the API!

If you are testing, you can always just set up a fake endpoint to return hardcoded data.

# LoginView.vue
```vue
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
const login = function(){
    // we can access the values of the input fields using the .value property
    console.log('Username:', username.value);
    console.log('Password:', password.value);
    // we can call a REST API to login
    // using the fetch function
    // try {
    //     const response = await fetch('http://localhost/api/login', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json'
    //         },
    //         body: JSON.stringify({
    //             username: username.value,
    //             password: password.value
    //         })
    //     });

    //     const data = await response.json();
    //     console.log('Success:', data);
    //     // do stuff with the data (like redirect to another page)
    // } catch (error) {
    //     console.error('Error:', error);
    // }
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
