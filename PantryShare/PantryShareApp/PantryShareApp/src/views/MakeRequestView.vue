<template>
    <div class="container mt-5">
      <h1>Request</h1>
  
      <form @submit.prevent="submitRequest">
        <div class="input-group mb-3">
          <label class="input-group-text" for="categoryGroup">Options</label>
          <select v-model="selectedCategory" @change="handleSelectedCategoryChange" class="form-select" id="categoryGroup">
            <option selected disabled>Choose Category:</option>
            <option v-for="(category, index) in categories" :key="index" :value="index + 1">{{ category }}</option>
          </select>
        </div>
  
        <div id="checkboxContainer">
          <div v-for="(item, index) in categoryItems" :key="index" class="input-group mb-3" v-if="!isSelected(item)">
            <input class="form-check-input" type="checkbox" :value="item" v-model="selectedItems">
            <label class="form-check-label">{{ item }}</label>
          </div>
        </div>
  
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
  const categories = ["Category 1", "Category 2", "Category 3"];
  const selectedCategory = ref(null);
  const categoryItems = ref([]);
  const selectedItems = ref([]);
  const userRequestList = ref([]);
  
  const submitRequest = () => {
    console.log("Selected items:", selectedItems.value);
    userRequestList.value = userRequestList.value.concat(selectedItems.value);
    selectedItems.value = [];
  };
  
  const handleSelectedCategoryChange = () => {
    categoryItems.value = categories[selectedCategory.value - 1];
  };
  
  const removeItem = (index) => {
    selectedItems.value.splice(index, 1);
  };
  
  const isSelected = (item) => {
    return selectedItems.value.includes(item);
  };
  </script>
  
  <style scoped>

  </style>
  