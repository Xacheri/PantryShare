<script setup>
import { ref } from 'vue'

const items = ref([
    {
      text: 'Item 1',
      checked: false
    },
    {
      text: 'Item 2',
      checked: false
    },
    {
      text: 'Item 3',
      checked: false
    },
    {
      text: 'Item 4',
      checked: false
    },
    {
      text: 'Item 5',
      checked: false
    }
]);
const domItemList = ref([])
const pushToBottom = function(event) {
    // Get the index of the item in the list (by its position in the DOM)
    const index = domItemList.value.indexOf(event.target.parentElement);
    const selectedItem = items.value[index];
    // Move the selected item to the bottom of the list
    items.value.splice(index, 1);
    items.value.push(selectedItem);
    
    selectedItem.checked = !selectedItem.checked; // Toggle the checked state of the selected item
    event.target.checked = false;  // untoggle the state of the clicked checkbox (remember the item moved)
}

</script>

<template>
    <div>
        <h1>Requested Items</h1>
        <form id="requestedItemsForm">
            <ul id="requestedItemsList">
                <li v-for="(item, index) in items" :key="index" ref="domItemList">
                    <input @change.prevent="pushToBottom" type="checkbox" :checked="item.checked"> {{ item.text }}
                </li>
            </ul>
        </form>
        <button id="droppedOffButton">Dropped Off</button>
    </div>
</template>

<style scoped>
</style>