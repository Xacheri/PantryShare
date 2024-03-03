<script setup>
import { ref } from 'vue';
import RadioTabs from '@/components/RadioTabs.vue';

const options = {
    tabs: [
        { label: 'Service History', value: 'service-history' },
        { label: 'Service Request', value: 'service-request' }
    ]
};
const selectedValue = ref('service-history');


const handleTabChange = (value) => {
    console.log('Tab changed:', value);
    selectedValue.value = value;
};
</script>

<template>
    <div>
        <RadioTabs :options="options.tabs" :default-index="0" @custom-change="(value) => handleTabChange(value)"/>
        <div v-if="selectedValue  === 'service-history'">

        </div>
        <div v-else-if="selectedValue === 'service-request'">

        </div>
    </div>
</template>

<style scoped>
/* Your component styles go here */
</style>