<script setup>
import { ref } from 'vue';
import { useFoodRequestStore } from '@/stores/foodrequest';
import { useRouter } from 'vue-router';
const router = useRouter();
const contact = ref('');
const pantryRequest = useFoodRequestStore();
const submitContact = function () {
    console.log('Submitting contact');
    console.log('Contact:', contact.value);

    const phoneNumberRegex = /^\d{10}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (phoneNumberRegex.test(contact.value) || emailRegex.test(contact.value)) {
        alert('Contact submitted: ' + contact.value);
        router.push('/');
    } else {
        alert('Invalid contact. Please enter a valid phone number or email.');
    }
}
</script>

<template>
    <div class="d-flex flex-column align-items-center">
        <h1>Request Fulfilled!</h1>
        <p>Food Request ID: {{ pantryRequest.foodrequest.order.OrderID }}</p>
        <p>Pickup Location: {{ pantryRequest.foodrequest.order.PickupLocation }}</p>
        <p>Food Request Status: {{ pantryRequest.foodrequest.order.Status }}</p>
        <div class="d-flex align-items-center">
            <p>Food Request Items:</p>
            <ul>
                <li v-for="(item, index) in pantryRequest.foodrequest.order.orderItems" :key="index">{{ item.FoodName }}
                </li>
            </ul>
        </div>
        <div class="overlay p-2 w-75">
            <h2>Note from Requestor:</h2>
            <p>{{ pantryRequest.foodrequest.order.RequestorNote }}</p>
        </div>
        <div>
            <h2>Submit a point of contact</h2>
            <span>(Email or Phone Number please)</span><br>
            <input type="text" v-model="contact" class="m-1" />
            <button @click="submitContact" class="btn btn-primary m-1">Submit</button>
        </div>
    </div>
</template>

<style scoped>
.overlay {
    background-color: var(--overlay-one);
    border-radius: 20px;
}
</style>