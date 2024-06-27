<script setup>

const model = defineModel({
    type:null,
    required: true,
});
const props = defineProps({
  name: {
    type: String,
    required: true
  },
  type: {
    type: String,
    default: 'text'
  },
  message: String
});

</script>
<template>
    <div class="mb-6">
      <label>{{ props.name }}</label>
      <input :type="props.type" v-model="model" :class="!ring-red-500">
      <small class="error" v-if="props.message">{{ props.message }}</small>
    </div>
  </template>
  

  