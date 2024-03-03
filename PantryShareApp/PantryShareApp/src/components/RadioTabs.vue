<script setup>
import { ref, defineProps, defineEmits } from 'vue'

const props = defineProps({
    options: Array,
    defaultIndex: Number
});

const emits = defineEmits(['custom-change']);
</script>

<template>
    <div class="radio-container">
        <div>
            <label v-for="(option, index) in options" :key="index">
                <input
                    type="radio"
                    :name="options[0].label"
                    :value="option.value"
                    :checked="index === props.defaultIndex"
                    @change="() => emits('custom-change', option.value)"
                >
                <span>{{ option.label }}</span>
            </label>
        </div>
    </div>
</template>

<style scoped>
:focus {
  outline: 0;
  border-color: #2260ff;
  box-shadow: 0 0 0 4px #b5c9fc;
}

.radio-container div {
  display: flex;
  flex-wrap: wrap;
  margin-top: 0.5rem;
  justify-content: center;
}

.radio-container input[type="radio"] {
  clip: rect(0 0 0 0);
  clip-path: inset(100%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}

.radio-container input[type="radio"]:checked + span {
  box-shadow: 0 0 0 0.0625em #0043ed;
  background-color: #dee7ff;
  z-index: 1;
  color: #0043ed;
}

label span {
  display: block;
  cursor: pointer;
  background-color: #fff;
  padding: 0.375em .75em;
  position: relative;
  margin-left: .0625em;
  box-shadow: 0 0 0 0.0625em #b5bfd9;
  letter-spacing: .05em;
  color: #3e4963;
  text-align: center;
  transition: background-color .5s ease;
}

label:first-child span {
  border-radius: .375em 0 0 .375em;
}

label:last-child span {
  border-radius: 0 .375em .375em 0;
}

</style>