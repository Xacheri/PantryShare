<script setup>
import LiftedButton from '@/components/LiftedButton.vue';
import { useRouter } from 'vue-router';
import { ref } from 'vue';
const router = useRouter();
const order = ref({
    OrderID: 21,
    UserID: 1,
    Status: 'Open',
    PickupLocation: '',
    FamilySize: 1,
    RequestorNote: '',
    orderItems: [
        // {
        //     FoodID: 1,
        //     FoodName: 'Canned Soup'
        // }
    ]
});
const newFoodItem = ref('');
const removeFoodItem = (food) => {
    const index = order.value.orderItems.indexOf(food);
    order.value.orderItems.splice(index, 1);
}
const addFoodItem = () => {
    order.value.orderItems.push({ FoodName: newFoodItem.value, FoodID: order.value.orderItems.length + 1});
    newFoodItem.value = '';
}
const submitRequest = () => {
    console.log('Submitting request');
    console.log('Request:', order._rawValue);
    router.push('/');
}
</script>

<template>
    <div>
        <h2>Make a Pantry Request</h2>
        <div class="form-group">
            <label for="familysize">Family Size</label>
            <input type="number" class="form-control" id="familysize" v-model="order.FamilySize">
        </div>
        <div class="form-group">
            <label for="loc">Pickup Location</label>
            <input type="text" class="form-control" id="loc" v-model="order.PickupLocation">
        </div>
        <div class="form-group">
            <!-- allow users to create and add food items here -->
            <label for="food">Food Items</label>
            <div class="d-flex align-items-center justify-content-between foodgroup" v-for="food in order.orderItems">
                <input type="text" class="form-control m-1" v-model="food.FoodName" disabled>
                <LiftedButton text="Delete" color="red" @custom-click="removeFoodItem(food)"/>
            </div>
            <div class="d-flex align-items-center justify-content-between foodgroup">
                <input type="text" class="form-control m-1" v-model="newFoodItem">
                <LiftedButton text="Add" color="green" @custom-click="addFoodItem"/>
            </div>
        </div>
        <div class="form-group">
            <label for="note">Leave a note about how to reach you.</label>
            <textarea class="form-control" id="note" v-model="order.RequestorNote"></textarea>
        </div>
        <div class="d-flex justify-content-center mt-3">
          <LiftedButton text="Submit Request" color="blue" @custom-click="submitRequest"/>
        </div>
    </div>
</template>

<style scoped>
/* Your component styles go here */
.foodgroup {
    border-radius: 10px;
    padding: 5px;
}
</style>