<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { ref } from 'vue'

const menuClicked = ref(false);
const navStyle = ref("")

const toggleMenu = function () {
  menuClicked.value = !menuClicked.value;
  navStyle.value = menuClicked.value ? "fade-inflate-fast" : "fade-deflate-fast";
}

const quickCloseMenu = function () {
  menuClicked.value = false;
  navStyle.value = "hidden";
}
</script>

<template>
  <header class="d-flex flex-column align-items-center">
    <img src="@/assets/logo.png" @click="toggleMenu" alt="logo" :width="menuClicked ? 75 : 150" />
    <transition name="fade">
      <nav v-if="menuClicked" class="w-75" :class="navStyle">
        <RouterLink to="/" @click="quickCloseMenu">Home</RouterLink>
        <RouterLink to="/about" @click="quickCloseMenu">About</RouterLink>
        <RouterLink to="/login" @click="quickCloseMenu">Login</RouterLink>
        <RouterLink to="/register" @click="quickCloseMenu">Register</RouterLink>
        <RouterLink to="/profile" @click="quickCloseMenu">Profile</RouterLink>
        <RouterLink to="/search" @click="quickCloseMenu">Search</RouterLink>
        <RouterLink to="/stockthepantry" @click="quickCloseMenu">Stock the Pantry</RouterLink>
        <RouterLink to="/makerequest" @click="quickCloseMenu">Make Request</RouterLink>
        <RouterLink to="/servicedetails" @click="quickCloseMenu">Service Details</RouterLink>
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
  padding: 0px 10px;
  border-radius: 10px;
  margin: auto;
  margin-bottom: 1rem;
  letter-spacing: 2px;
}



.fade-enter-active, .fade-leave-active {
  transition: opacity 0.25s, transform 0.25s; /* Transition opacity and transform */
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}

.hidden {
  opacity: 0;
  transition: none !important;
}
</style>