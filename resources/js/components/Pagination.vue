<template>
  <nav
    v-if="pagination.total > pagination.per_page"
    class="flex flex-col sm:flex-row items-center justify-end mt-4 w-full"
  >
    <!-- Mobile Layout -->
    <div class="flex w-full justify-between sm:hidden">
      <button
        @click.prevent="goToPage(pagination.current_page - 1)"
        :disabled="!pagination.prev_page_url"
        class="px-4 py-2 border rounded-full text-sm font-medium transition
               disabled:opacity-50 disabled:cursor-not-allowed
               hover:text-white hover:bg-red-500 text-gray-700 ml-2"
      >
        « Prev
      </button>

      <button
        @click.prevent="goToPage(pagination.current_page + 1)"
        :disabled="!pagination.next_page_url"
        class="px-4 py-2 border rounded-full text-sm font-medium transition
               disabled:opacity-50 disabled:cursor-not-allowed
               hover:text-white hover:bg-red-500 text-gray-700 mr-2"
      >
        Next »
      </button>
    </div>

    <!-- Desktop Layout -->
    <ul class="hidden sm:inline-flex items-center space-x-1">
      <!-- Previous Button -->
      <li>
        <button
          @click.prevent="goToPage(pagination.current_page - 1)"
          :disabled="!pagination.prev_page_url"
          class="px-3 py-1 border rounded text-sm transition
                 disabled:opacity-50 disabled:cursor-not-allowed
                 hover:text-white hover:bg-red-500 text-gray-700"
        >
          « Prev
        </button>
      </li>

      <!-- Page Numbers -->
      <li v-for="page in pagesToShow" :key="page.key">
        <button
          v-if="page.number"
          @click.prevent="goToPage(page.number)"
          :class="[
            'px-3 py-1 border rounded text-sm transition',
            page.active
              ? 'bg-red-500 text-white border-red-500'
              : 'bg-white text-gray-700 hover:bg-gray-100'
          ]"
        >
          {{ page.number }}
        </button>

        <span v-else class="px-3 py-1 text-gray-400">…</span>
      </li>

      <!-- Next Button -->
      <li>
        <button
          @click.prevent="goToPage(pagination.current_page + 1)"
          :disabled="!pagination.next_page_url"
          class="px-3 py-1 border rounded text-sm transition
                 disabled:opacity-50 disabled:cursor-not-allowed
                 hover:text-white hover:bg-red-500 text-gray-700"
        >
          Next »
        </button>
      </li>
    </ul>
  </nav>
</template>

<script setup>
import { computed } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  pagination: Object
})

function goToPage(page) {
  if (page >= 1 && page <= props.pagination.last_page && page !== props.pagination.current_page) {
    const url = `${props.pagination.path}?page=${page}`
    router.visit(url, { preserveScroll: true })
  }
}

// Desktop pagination logic with ellipsis
const pagesToShow = computed(() => {
  const total = props.pagination.last_page
  const current = props.pagination.current_page
  const delta = 1
  const pages = []

  if (total <= 5) {
    for (let i = 1; i <= total; i++) {
      pages.push({ key: i, number: i, active: i === current })
    }
    return pages
  }

  const range = []
  const left = current - delta
  const right = current + delta

  for (let i = 1; i <= total; i++) {
    if (i === 1 || i === total || (i >= left && i <= right)) range.push(i)
  }

  let lastPage = 0
  for (const i of range) {
    if (lastPage && i - lastPage > 1) pages.push({ key: `ellipsis-${i}`, number: null })
    pages.push({ key: i, number: i, active: i === current })
    lastPage = i
  }

  return pages
})
</script>
