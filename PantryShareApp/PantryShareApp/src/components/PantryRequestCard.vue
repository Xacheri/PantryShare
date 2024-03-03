<script setup>
import { toRefs, ref } from 'vue';
import { useFoodRequestStore } from '@/stores/foodrequest';
import LiftedButton from '@/components/LiftedButton.vue';
import ConfirmModal from '@/components/ConfirmModal.vue';
// register props
const props = defineProps({
    pantryRequest: {
        type: Object,
        required: true
    },
    noButton: {
        type: Boolean,
        default: false
    },
    privacyRender: {
        type: Boolean,
        default: false
    }
});
// register emitters
const emit = defineEmits(['fulfillRequest']);
const showModal = ref(false);
// grab state
const foodRequestStore = useFoodRequestStore();
const { pantryRequest } = toRefs(props);

const fulfillRequest = () => {
    const propRequest = pantryRequest.value;
    const request = propRequest;
    // are you sure you want to do this?



    request.order.Status = "In Progress";
    foodRequestStore.updateFoodRequestStore(request); // put the request in the pocket
    showModal.value = false;
    emit('fulfillRequest'); // send the request to the parent, to tell it to navigate to the next page
}

const statusClass = (status) => {
    switch (status) {
        case 'Open':
            return 'green-bg';
        case 'In-Progress':
            return 'yellow-bg';
        case 'Completed':
            return 'red-bg';
        default:
            return '';
    }
};
</script>

<template>
    <div class="grid-container p-1">
        <ConfirmModal v-if="showModal" @confirm="fulfillRequest" @cancel="() => showModal = false">
            <p>Are you sure you want to fulfill this request?</p>
        </ConfirmModal>
        <div class="grid-item">
            <div class="card p-1">
                <div class="d-flex justify-content-between align-items-center flex-wrap m-2">
                    <h5 class="card-title text-info">{{ pantryRequest.order.orderItems.length + " Items" +
                        (privacyRender ? "." : " at " +
                            pantryRequest.order.PickupLocation + ".") }}</h5>
                    <div class="grid-item d-flex justify-content-center p-1 m-1 status"
                        :class="statusClass(pantryRequest.order.Status)">
                        <p class="card-text">Status: {{ pantryRequest.order.Status }}</p>
                    </div>
                </div>
                <div class="w-75 m-1">
                    <ul class="p-1">
                        <li v-for="(item, index) in pantryRequest.order.orderItems" :key="item.FoodID">
                            {{ item.FoodName }}<span
                                v-if="index !== pantryRequest.order.orderItems.length - 1">,</span><span v-else>.</span>
                        </li>
                    </ul>
                </div>
                <LiftedButton v-if="!noButton" text="Fulfill Request" @click="showModal = true" color="blue" />
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
    min-width: fit-content;
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

.yellow-bg {
    background-color: var(--theme-yellow);
}

.green-bg {
    background-color: var(--theme-green);
}

.red-bg {
    background-color: var(--theme-red);
}

.status {
    border-radius: 10px;
    box-shadow: 5px 5px 5px #000;
    min-width: fit-content;
}

.status p {
    text-wrap: none;
}
</style>