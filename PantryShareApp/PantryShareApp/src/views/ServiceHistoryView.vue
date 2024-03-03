<script setup>
import { ref, onMounted } from 'vue';
import RadioTabs from '@/components/RadioTabs.vue';
import ServiceRequestHistory from '@/components/ServiceRequestHistory.vue';
import ServiceFulfilledHistory from '@/components/ServiceFulfilledHistory.vue';
import TestDataClass from '@/classes/TestDataClass';

const options = {
    tabs: [
        { label: 'Service History', value: 'service-history' },
        { label: 'Service Request History', value: 'service-request' }
    ]
};
const selectedValue = ref('service-history');
const allRequests = ref({});

const handleTabChange = (value) => {
    console.log('Tab changed:', value);
    selectedValue.value = value;
};

const getPantryRequests = function () {
    console.log('Getting pantry requests');
    try {
        allRequests.value = TestDataClass.getRequestAndServiceHistoryForUser();
        console.log('Success:', allRequests.value);
    } catch (error) {
        console.error('Error:', error);
    }
};

onMounted(() => {
    getPantryRequests();
});
</script>

<template>
    <div>
        <RadioTabs :options="options.tabs" :default-index="0" @custom-change="(value) => handleTabChange(value)"/>
        <div v-if="selectedValue  == 'service-history'">
            <ServiceFulfilledHistory :pantry-requests="allRequests.service_orders"/>
        </div>
        <div v-if="selectedValue == 'service-request'">
            <ServiceRequestHistory :pantry-requests="allRequests.request_orders"/>
        </div>
    </div>
</template>

<style scoped>
/* Your component styles go here */
</style>