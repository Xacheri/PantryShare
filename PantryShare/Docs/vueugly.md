# Vue is Ugly and I don't like it
Now I understand why you may feel that way. We have abstracted the DOM into the clouds, and taken everything you knew and loved
about vanilla javascript and swept it under the rug. However, Vue is EXCEPTIONALLY powerful for pages that are dynamic and for
writing modular and reusable components.

For example, here is a vanilla HTML/CSS/JS way of displaying a list of items

```html
<div class="container">
    <h1>Requested Items</h1>
    <form id="requestedItemsForm">
      <ul id="requestedItemsList">
        <!-- Requested items will be dynamically added here -->
      </ul>
    </form>
    <button id="droppedOffButton">Dropped Off</button>
  </div>

  <script>
    // Sample data for requested items
    const requestedItems = [
      "Item 1",
      "Item 2",
      "Item 3",
      "Item 4",
      "Item 5"
    ];

    // Function to create list items for requested items
    function createRequestedItemsList() {
      const requestedItemsList = document.getElementById("requestedItemsList");
      requestedItemsList.innerHTML = ""; // Clear previous items

      requestedItems.forEach(item => {
        const listItem = document.createElement("li");
        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.value = item;
        checkbox.addEventListener("change", moveCheckedItem);
        listItem.appendChild(checkbox);
        listItem.appendChild(document.createTextNode(item));
        requestedItemsList.appendChild(listItem);
      });
    }

    // Initial rendering of requested items list
    createRequestedItemsList();

    // Function to move checked item to the bottom of the list
    function moveCheckedItem(event) {
      const listItem = event.target.parentNode;
      const requestedItemsList = listItem.parentNode;
      const checked = event.target.checked;

      if (checked) {
        requestedItemsList.appendChild(listItem);
      } else {
        // Move item back to its original position if unchecked
        requestedItemsList.insertBefore(listItem, requestedItemsList.firstChild);
      }
    }
  </script>
```

You have to dynamically create each element and insert it into the page. Without looking and reading the script end-to-end, it is hard to tell exactly what the page does.

## Vs the Vue.js Way

```vue
<script setup>
import { ref } from 'vue'

const items = ref([
    { text: 'Item 1', checked: false },
    { text: 'Item 2', checked: false },
    { text: 'Item 3', checked: false },
    { text: 'Item 4', checked: false },
    { text: 'Item 5', checked: false }
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
```
## Comparison

In this particular example, Vue.js presents 3 advantages
 1. Manipulate Objects instead of the DOM
    - Notice that we change our items array of regular JS values instead of changing the HTML of the page.
    - In cases that we need to interact through the dom, we don't have to write out document.GetBlahBlahBlah, we can just bind a ref variable to that and use ref.value.whatever to interact with it.
2. Concise List rendering
    - We can succinctly describe what we want to do when we display a list of items. You can look at the HTML and tell that we are creating a list of things without having to go to the script. This helps A LOT when applications get larger
3. State Management
    - We don't have to implicitly code a value to change whenever an input changes. When we bind a variable, either in text with {{ }} or with v-model, when it changes, it changes everywhere in the component. When apps get larger, this saves a lot of code and lifecycle management.