<template>
  <transition name="fade">
    <div
      v-if="isVisible"
      class="fixed px-1 inset-0 z-50 flex items-center justify-center"
    >
      <!-- Backdrop -->
      <div
        class="fixed inset-0 bg-black/50 transition-opacity"
        @click="onCancel"
      ></div>

      <!-- Modal panel -->
      <transition name="scale">
        <div
          v-if="isVisible"
          class="relative bg-white rounded-lg shadow-xl max-w-lg w-full z-50 py-6 overflow-hidden"
        >
          <!-- Content -->
          <div class="px-6 py-4">
            <div class="flex items-start">
              <!-- Default Icon -->
              <div
                class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-full bg-red-100"
              >
                <slot name="icon">
                  <svg
                    class="h-6 w-6 text-red-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="1.5"
                      d="M12 9v3.75m-9.303 3.376c-.866 1.5.217
                      3.374 1.948 3.374h14.71c1.73 0
                      2.813-1.874 1.948-3.374L13.949
                      3.378c-.866-1.5-3.032-1.5-3.898
                      0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"
                    />
                  </svg>
                </slot>
              </div>

              <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-900">
                  <slot name="title">Confirm Action</slot>
                </h3>
                <div class="mt-2 text-sm text-gray-600">
                  <slot name="message">
                    Are you sure you want to perform this action?
                  </slot>
                </div>
              </div>
            </div>
          </div>

          <!-- Footer -->
          <div class="bg-gray-50 px-6 py-3 flex justify-end gap-3">
            <slot name="footer">
              <button
                @click="onDelete"
                class="cursor-pointer bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-500"
              >
                Delete
              </button>
              <button
                @click="onCancel"
                class="cursor-pointer bg-gray-200 px-4 py-2 rounded-md text-sm font-medium text-gray-800 hover:bg-gray-300"
              >
                Cancel
              </button>
            </slot>
          </div>
        </div>
      </transition>
    </div>
  </transition>
</template>

<script setup>
import { ref, watch } from "vue";

const props = defineProps({
  modelValue: { type: Boolean, default: false },
});
const emit = defineEmits(["update:modelValue", "cancel", "delete"]);

const isVisible = ref(props.modelValue);

watch(
  () => props.modelValue,
  (val) => (isVisible.value = val)
);
watch(isVisible, (val) => emit("update:modelValue", val));

function onCancel() {
  emit("cancel");
  isVisible.value = false;
}

function onDelete() {
  emit("delete");
  isVisible.value = false;
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.scale-enter-active {
  transition: transform 0.2s ease, opacity 0.2s ease;
}
.scale-enter-from {
  transform: scale(0.95);
  opacity: 0;
}
.scale-leave-to {
  transform: scale(0.95);
  opacity: 0;
}
</style>
