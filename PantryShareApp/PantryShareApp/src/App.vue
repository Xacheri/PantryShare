<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
import { onMounted, ref } from 'vue'

const menuClicked = ref(false);

const toggleMenu = function() {
  menuClicked.value = !menuClicked.value;
}
</script>

<template>
  <header class="d-flex flex-column align-items-center">
    <img src="@/assets/logo.png" @click="toggleMenu" alt="logo" width="150"/>
    <nav v-if="menuClicked" class="w-75">
      <RouterLink to="/">Home</RouterLink>
      <RouterLink to="/about">About</RouterLink>
      <RouterLink to="/login">Login</RouterLink>
      <RouterLink to="/register">Register</RouterLink>
      <RouterLink to="/search">Search</RouterLink>
      <RouterLink to="/stockthepantry">Stock the Pantry</RouterLink>
      <RouterLink to="/makerequest">Make Request</RouterLink>
      <RouterLink to="/servicedetails">Service Details</RouterLink>
    </nav>
  </header>
  <RouterView />
  <footer>

  </footer>
</template>

<style scoped>
nav {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  background-color: #f0f0f0;
  padding: 10px;
  border-radius: 10px;
  margin-top: 10px;
}
</style>
