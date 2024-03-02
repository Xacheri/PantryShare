<script setup>
import { onMounted, ref } from 'vue'
import PantryRequestCard from '@/components/PantryRequestCard.vue'

const pantryRequests = ref([
    {
      text: 'Item 1',
      quantity: 5
    },
    {
      text: 'Item 2',
      quantity: 3
    },
    {
      text: 'Item 3',
      quantity: 2
    },
    {
      text: 'Item 4',
      quantity: 1
    },
    {
      text: 'Item 5',
      quantity: 4
    }
]);

const getPantryRequests = function() {
    console.log('Getting pantry requests');
    // Call a REST API to get the pantry requests
    try {
        // const response = await fetch('http://localhost/api/api.php?action=getlocalrequests', {
        //     method: 'GET',
        //     headers: {
        //         'Content-Type': 'application/json'
        //     }, 
        //     body: JSON.stringify({
        //         zip: '12345'
        //     })
            

        //const data = await response.json();
        //pantryRequests.value = data;
        console.log('Success:', pantryRequests.value);
        // do stuff with the data (like update the pantryRequests variable)
    } catch (error) {
        console.error('Error:', error);
    }
}

onMounted(() => {
    getPantryRequests();
});
</script>

<template>
   <div id="pantry-stock-container">
        <h1>Current Pantry Requests</h1>
          <div id="pantryRequestList">
              <PantryRequestCard v-for="(item, index) in pantryRequests" :key="index" :pantry-request="item" />
          </div>
    </div>
</template>

<style scoped>
/* Your component's CSS styles go here */
</style>