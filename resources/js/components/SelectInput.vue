<template>
  <div class="relative w-full" ref="dropdownRoot">
    <label
      v-if="label"
      :for="id"
      class="block mb-1 text-sm font-medium text-gray-700"
    >
      {{ label }}
    </label>

    <!-- Trigger Button -->
    <button
      type="button"
      @click="open = !open"
      class="w-full px-3 py-3 border rounded-md border-gray-300 focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none flex justify-between items-center"
    >
      <span>{{ selectedLabel || placeholder }}</span>
      <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
      </svg>
    </button>

    <!-- Dropdown -->
    <div
      v-if="open"
      class="absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-auto"
    >
      <div
        v-for="option in options"
        :key="option.id"
        @click="selectOption(option)"
        class="px-3 py-2 cursor-pointer hover:bg-red-500 hover:text-white"
        :class="{
          'bg-red-500 text-white': isSelected(option)
        }"
      >
        {{ option[name] }}
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, onBeforeUnmount } from 'vue'

const props = defineProps({
  modelValue: [String, Number, Object],
  options: {
    type: Array,
    required: true,
    default: () => [],
  },
  label: String,
  name: String, // key in option object for display
  id: String,
  placeholder: String,
})

const emit = defineEmits(['update:modelValue'])

const open = ref(false)
const dropdownRoot = ref(null)

const selectedLabel = computed(() => {
  const currentValue = getValue(props.modelValue)
  const selectedOption = props.options.find(opt => String(opt.id) === String(currentValue))
  return selectedOption ? selectedOption[props.name] : ''
})

function selectOption(option) {
  emit('update:modelValue', option.id)
  open.value = false
}

function isSelected(option) {
  return String(option.id) === String(getValue(props.modelValue))
}

function getValue(val) {
  if (val && typeof val === 'object') {
    return val.id ?? ''
  }
  return val ?? ''
}

// Close dropdown on outside click
function handleClickOutside(event) {
  if (dropdownRoot.value && !dropdownRoot.value.contains(event.target)) {
    open.value = false
  }
}

onMounted(() => {
  document.addEventListener('click', handleClickOutside)
})

onBeforeUnmount(() => {
  document.removeEventListener('click', handleClickOutside)
})
</script>
