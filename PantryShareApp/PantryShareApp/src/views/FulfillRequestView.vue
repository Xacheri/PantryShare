<script setup>
import { ref } from 'vue';
import { useFoodRequestStore } from '@/stores/foodrequest';
import { useRouter } from 'vue-router';
import LiftedButton from '@/components/LiftedButton.vue';
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
    <h1>Request Fulfilled!</h1>
    <div class="m-5 fit-content d-flex flex-column align-items-start">
        <p>Food Request ID: {{ pantryRequest.foodrequest.order.OrderID }}</p>
        <p>Pickup Location: {{ pantryRequest.foodrequest.order.PickupLocation }}</p>
        <p>Food Request Status: {{ pantryRequest.foodrequest.order.Status }}</p>
        <div class="card d-flex align-items-start w-75 overlay">
            <p>Food Request Items:</p>
            <ul class="d-flex flex-wrap justify-content-center list-style-none">
                <li class="p-2" v-for="(item, index) in pantryRequest.foodrequest.order.orderItems" :key="index">{{
            item.FoodName }}
                </li>
            </ul>
        </div>
        <div class="card mt-3 d-flex align-items-center w-75 overlay">
            <h2>Note from Requestor:</h2>
            <p>{{ pantryRequest.foodrequest.order.RequestorNote }}</p>
        </div>
        <div class="d-flex flex-column w-100 m-1 p-1">
            <h2>Submit a point of contact</h2>
            <span>(Email or Phone Number please)</span><br>
            <input type="text" v-model="contact" class="m-1" />
            <LiftedButton text="Submit Contact" color="blue" @custom-click="submitContact" />
        </div>
    </div>
</template>

<style scoped>
.overlay {
    background-color: var(--overlay-one);
    border-radius: 20px;
    padding: 20px;
    box-shadow: 5px 5px 10px var(--theme-grey);
}

li {
    list-style-type: none;
    margin: 0;
    padding: 0;
    text-indent: 0;

}

ul {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 0;
    list-style: none;
    padding-left: 0;
    padding: 5px;

}

.overlay-two {
    background-color: var(--theme-grey);
    border-radius: 20px;
    box-shadow: inset 10px 10px 15px var(--overlay-three);
}

.note {
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid var(--theme-grey);
    box-shadow: 5px 5px 5px var(--theme-grey);
}

.fit-content {
    max-width: fit-content !important;
    margin: 0 auto;
}
</style>