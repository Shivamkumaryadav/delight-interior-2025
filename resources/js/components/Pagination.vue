<template>
  <nav class="flex items-center justify-center space-x-1">
    <button
      :disabled="!pagination.prev_page_url"
      @click="$emit('page-changed', pagination.current_page - 1)"
      class="px-3 py-1 rounded border disabled:opacity-50"
    >
      Prev
    </button>

    <button
      v-for="link in pagination.links"
      :key="link.label"
      :disabled="!link.url || link.active"
      @click="$emit('page-changed', link.label)"
      class="px-3 py-1 rounded border"
      :class="link.active ? 'bg-blue-500 text-white' : ''"
    >
      {{ link.label }}
    </button>

    <button
      :disabled="!pagination.next_page_url"
      @click="$emit('page-changed', pagination.current_page + 1)"
      class="px-3 py-1 rounded border disabled:opacity-50"
    >
      Next
    </button>
  </nav>
</template>

<script setup>
defineProps({
  pagination: Object // The paginated data from API
});
</script>
