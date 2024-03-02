<script setup>
import { ref } from 'vue'

// register props
const props = defineProps({
    pantryRequest: {
        type: Object,
        required: true
    }
}
)
</script>

<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-info">{{ pantryRequest.order.orderItems.length + " Items at " + pantryRequest.order.PickupLocation + "."}}</h5>            <ul>
                <li v-for="item in pantryRequest.order.orderItems" :key="item.FoodID">
                    {{ item.FoodName }} - {{ item.CategoryName }}
                </li>
            </ul>
            <p class="card-text">Status: {{ pantryRequest.order.Status }}</p>
            <p class="card-text">Pickup Location: {{ pantryRequest.order.PickupLocation }}</p>
            <p class="card-text">Requested by: {{ pantryRequest.user.UserName }}</p>
        </div>
    </div>
</template>

<style scoped>
/* Your component's CSS styles go here */
</style>