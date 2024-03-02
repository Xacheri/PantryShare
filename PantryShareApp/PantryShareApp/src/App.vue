<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { ref } from 'vue'

const menuClicked = ref(false);
const navStyle = ref("")

const toggleMenu = function () {
  menuClicked.value = !menuClicked.value;
  navStyle.value = menuClicked.value ? "fade-inflate-fast" : "fade-deflate-fast";
}
</script>

<template>
  <header class="d-flex flex-column align-items-center">
    <img src="@/assets/logo.png" @click="toggleMenu" alt="logo" :width="menuClicked ? 75 : 150" />
    <transition name="fade">
      <nav v-if="menuClicked" class="w-75" :class="navStyle">
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
        <RouterLink to="/login">Login</RouterLink>
        <RouterLink to="/register">Register</RouterLink>
        <RouterLink to="/profile">Profile</RouterLink>
        <RouterLink to="/search">Search</RouterLink>
        <RouterLink to="/stockthepantry">Stock the Pantry</RouterLink>
        <RouterLink to="/makerequest">Make Request</RouterLink>
        <RouterLink to="/servicedetails">Service Details</RouterLink>
      </nav>
    </transition>
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
  background-color: var(--overlay-one);
  padding: 10px;
  border-radius: 10px;
  margin-top: 10px;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 1s, transform 1s; /* Transition opacity and transform */
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>