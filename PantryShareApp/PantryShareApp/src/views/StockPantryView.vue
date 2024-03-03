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
  },
  {
    order: {
      OrderID: 2,
      UserID: 2,
      FamilySize: 4,
      Status: "Open",
      PickupLocation: "Walmart Supercenter on W. Sunshine St",
      orderItems: [
        {
          FoodID: 5,
          FoodName: "Bananas",
          CategoryID: 1,
          CategoryName: "Fruits",
        },
        {
          FoodID: 12,
          FoodName: "Carrots",
          CategoryID: 2,
          CategoryName: "Vegetables",
        },
        {
          FoodID: 14,
          FoodName: "Broccoli",
          CategoryID: 2,
          CategoryName: "Vegetables",
        },
        {
          FoodID: 24,
          FoodName: "Eggs",
          CategoryID: 5,
          CategoryName: "Dairy",
        },
        {
          FoodID: 18,
          FoodName: "Chicken",
          CategoryID: 4,
          CategoryName: "Proteins",
        },
      ],
    },
    user: {
      UserID: 2,
      UserName: "jdoe",
      EmailAddress: "jdoe@example.com",
      FirstName: "John",
      LastName: "Doe",
      Location: 65807,
    }
  },
  {
    order: {
      OrderID: 3,
      UserID: 3,
      FamilySize: 2,
      Status: "Open",
      PickupLocation: "Target on E. Independence St",
      orderItems: [
        {
          FoodID: 3,
          FoodName: "Oranges",
          CategoryID: 1,
          CategoryName: "Fruits",
        },
        {
          FoodID: 9,
          FoodName: "Tomatoes",
          CategoryID: 2,
          CategoryName: "Vegetables",
        },
        {
          FoodID: 11,
          FoodName: "Spinach",
          CategoryID: 2,
          CategoryName: "Vegetables",
        },
        {
          FoodID: 22,
          FoodName: "Cheese",
          CategoryID: 5,
          CategoryName: "Dairy",
        },
        {
          FoodID: 20,
          FoodName: "Beef",
          CategoryID: 4,
          CategoryName: "Proteins",
        },
      ],
    },
    user: {
      UserID: 3,
      UserName: "asmith",
      EmailAddress: "asmith@example.com",
      FirstName: "Alice",
      LastName: "Smith",
      Location: 65802,
    }
  }]
);

const getPantryRequests = function () {
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

const doublePantryRequests = function () {
  pantryRequests.value = pantryRequests.value.concat(pantryRequests.value);
}

onMounted(() => {
  getPantryRequests();
});
</script>

<template>
  <div id="pantry-stock-container">
    <h1>Current Pantry Requests</h1>
    <div class="row">
      <div class="col-6">
        <PantryRequestCard v-for="(item, index) in pantryRequests.slice(0, pantryRequests.length / 2)" :key="index"
          :pantry-request="item" />
      </div>
      <div class="col-6">
        <PantryRequestCard v-for="(item, index) in pantryRequests.slice(pantryRequests.length / 2)" :key="index"
          :pantry-request="item" />
      </div>
    </div>
    <button @click="doublePantryRequests">Double Pantry Requests</button>
  </div>
</template>

<style scoped>
/* Your component's CSS styles go here */
</style>