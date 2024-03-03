<script setup>
import { defineProps } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

// register props
const props = defineProps({
    pantryRequest: {
        type: Object,
        required: true
    }
}
)

const fulfillRequest = function(){
    console.log('Fulfilling request');
    router.push('/fulfillrequest');
}

</script>

<template>
    <div class="grid-container p-1">
        <div class="grid-item">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-info">{{ pantryRequest.order.orderItems.length + " Items at " +
                        pantryRequest.order.PickupLocation + "." }}</h5>
                    <ul>
                        <li v-for="(item, index) in pantryRequest.order.orderItems" :key="item.FoodID">
                            {{ item.FoodName }}<span v-if="index !== pantryRequest.order.orderItems.length - 1">,</span><span v-else>.</span>
                        </li>
                    </ul>
                    <div class="grid-item">
                        <p class="card-text">Status: {{ pantryRequest.order.Status }}</p>
                    </div>
                </div>
                <button class="btn btn-primary m-1" @click="fulfillRequest">Fulfill Request</button>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Your component's CSS styles go here */
.card {
    margin: 2px;
    padding: 4px;
    border: 1px solid #000;
    border-radius: 10px;
    box-shadow: 5px 5px 5px #000;
}

.card-text {
    margin: 0;
    padding: 0;
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
</style>