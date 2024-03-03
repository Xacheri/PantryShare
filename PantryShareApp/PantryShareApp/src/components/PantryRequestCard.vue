<script setup>
import { toRefs } from 'vue';
import { useFoodRequestStore } from '@/stores/foodrequest';
import LiftedButton from '@/components/LiftedButton.vue';
// register props
const props = defineProps({
    pantryRequest: {
        type: Object,
        required: true
    }
});
// register emitters
const emit = defineEmits(['fulfillRequest']);

// grab state
const foodRequestStore = useFoodRequestStore();
const { pantryRequest } = toRefs(props);

const fulfillRequest = () => {
    const propRequest = pantryRequest.value;
    const request = propRequest;
    request.order.Status = "In Progress";
    foodRequestStore.updateFoodRequestStore(request); // put the request in the pocket
    emit('fulfillRequest'); // send the request to the parent, to tell it to navigate to the next page
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
                <LiftedButton text="Fulfill Request" @click="fulfillRequest" color="blue"/>
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