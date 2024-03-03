<script setup>
import { onMounted, ref } from 'vue'
import { defineProps, defineEmits } from 'vue'

const props = defineProps({
    color: String,
    text: String
});

const emit = defineEmits(['custom-click']);

const computedClass = ref('');

onMounted(() => {
    computedClass.value = props.color || 'blue';
});


</script>

<template>
    <button @click="() => emit('custom-click')" :class="computedClass">{{ text }}</button>
</template>

<style scoped>
.blue {
    background-color: var(--theme-blue) !important;
    color: var(--theme-white) !important;
    box-shadow: hsl(191, 65%, 40%) 0px 10px 0px 0px !important;
}
.blue:hover {
    box-shadow: hsl(191, 65%, 40%) 0px 7px 0px 0px !important;
}
.blue:active {
    background-color: hsl(191, 65%, 80%) !important;
    box-shadow: hsl(191, 65%, 80%) 0px 0px 0px 0px !important;
}

.red {
    background-color: var(--theme-red) !important;
    color: var(--theme-white) !important;
    box-shadow: hsl(0, 70%, 40%) 0px 10px 0px 0px !important;
}
.red:hover {
    box-shadow: hsl(0, 70%, 40%) 0px 7px 0px 0px !important;
}
.red:active {
    background-color: hsl(0, 70%, 80%) !important;
    box-shadow: hsl(0, 70%, 80%) 0px 0px 0px 0px !important;
}

.yellow {
    background-color: var(--theme-yellow) !important;
    color: black !important;
    box-shadow: hsl(50, 70%, 40%) 0px 10px 0px 0px !important;
}
.yellow:hover {
    box-shadow: hsl(50, 70%, 40%) 0px 7px 0px 0px !important;
}
.yellow:active {
    background-color: hsl(50, 70%, 80%) !important;
    box-shadow: hsl(50, 70%, 80%) 0px 0px 0px 0px !important;
}

button {
  padding: 10px 30px;
  border-radius: 10px;
  border: 0;
  letter-spacing: 1.5px;
  font-size: 15px;
  transition: all 0.3s ease;
  margin-bottom: 11px;
  cursor: pointer;
}


button:active {
  transform: translateY(5px);
  transition: 200ms;
}

</style>