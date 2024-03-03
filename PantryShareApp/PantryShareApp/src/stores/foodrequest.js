// this is a pinia store
// think of it like a pocket to put data in
// that you can access from anywhere in thw app

// this one holds a food request
// use it like this in a component:
// import { useFoodRequestStore } from '@/stores/foodrequest'
// const foodrequest = useFoodRequestStore()
// foodrequest.updateFoodRequestStore(newFoodRequest)
// console.log(foodrequest.foodRequest) // dot notation to access the food request, action function to update it
import { defineStore } from "pinia";
import { ref } from "vue";
export const useFoodRequestStore = defineStore('foodrequest', () => {
	const foodrequest = ref({});
    function updateFoodRequestStore(newFoodRequest) {
        foodrequest.value = newFoodRequest;
    }

    return {
        foodrequest,
        updateFoodRequestStore
    }
});
