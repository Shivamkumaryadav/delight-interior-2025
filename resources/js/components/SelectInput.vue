<template>
  <div class="w-full">
    <label v-if="label" :for="id" class="block mb-1 text-sm font-medium text-gray-700">
      {{ label }}
    </label>
    <select
      :id="id"
      :modelValue="modelValue"
      @change="$emit('update:modelValue', $event.target.value)"
      class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-black"
    >
      <option v-if="placeholder" disabled selected >{{ placeholder }}</option>
      <option
        v-for="option in options"
        :key="option.id"
        :value="option.id"
      >
        {{ option[name] }}
      </option>
    </select>
  </div>
</template>

<script setup>
defineProps({
  modelValue: [String, Number],
  options: {
    type: Array,
    required: true,
    default: () => [],
  },
  label: String,
  name: Object,
  id: String,
  placeholder: String,
})

defineEmits(['update:modelValue'])
</script>
