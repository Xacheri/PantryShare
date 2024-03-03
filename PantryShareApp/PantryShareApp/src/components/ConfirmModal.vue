<script setup>
import { ref, defineEmits, defineProps } from 'vue'
import LiftedButton from '@/components/LiftedButton.vue';
const showModal = ref(true);
const { emit } = defineEmits(['confirm', 'cancel']);


</script>


<template>
  <div v-show="showModal" class="modal" @click="handleCancel">
    <div class="modal-content w-75 p-3" @click.stop>
      <slot></slot>
      <div class="modal-actions d-flex justify-content-around">
        <LiftedButton color="blue" text="Yes" @custom-click="$emit('confirm')" />
        <LiftedButton color="yellow" text="No" @custom-click="$emit('cancel')" />
      </div>
    </div>
  </div>
</template>

<style scoped>
.modal {
  display: flex;
  align-items: center;
  justify-content: center;
  backdrop-filter: blur(5px);
}

.modal-content {
  background-color: var(--theme-white);
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}
</style>