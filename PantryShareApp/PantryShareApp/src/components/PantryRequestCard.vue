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
            <h5 class="card-title text-info">{{ pantryRequest.text }}</h5>
            <p class="card-text text-secondary">Quantity: {{ pantryRequest.quantity }}</p>
        </div>
    </div>
</template>

<style scoped>
/* Your component's CSS styles go here */
</style>