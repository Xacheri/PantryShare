<script setup>
import { onMounted, ref } from 'vue'
import PantryRequestCard from '@/components/PantryRequestCard.vue'

const pantryRequests = ref(
  [{
    order: {
      OrderID: 1,
      UserID: 1,
      FamilySize: 3,
      Status: "Open",
      PickupLocation: "Krogers on S. Glenstone",
      orderItems: [
        {
          FoodID: 1,
          FoodName: "Apples",
          CategoryID: 1,
          CategoryName: "Fruits",
        },
        {
          FoodID: 8,
          FoodName: "Onions",
          CategoryID: 2,
          CategoryName: "Vegetables",
        },
        {
          FoodID: 10,
          FoodName: "Potatoes",
          CategoryID: 2,
          CategoryName: "Vegetables",
        },
        {
          FoodID: 21,
          FoodName: "Milk",
          CategoryID: 5,
          CategoryName: "Dairy",
        },
        {
          FoodID: 16,
          FoodName: "Fish",
          CategoryID: 4,
          CategoryName: "Proteins",
        },
      ],
  },
  user: {
    UserID: 1,
    UserName: "llathrop",
    EmailAddress: "ll0128774@otc.edu",
    FirstName: "Louis",
    LastName: "Lathrop",
    Location: 65804,
  }
}]
);

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