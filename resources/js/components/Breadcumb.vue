<script setup>
import { Link } from "@inertiajs/vue3";

// Props
defineProps({
  items: {
    type: Array,
    required: true,
    // Example: [{ text: "App Center", url: "/app-center" }, { text: "Application" }]
  }
});
</script>

<template>
  <ol class="flex items-center whitespace-nowrap">
    <!-- First item always Dashboard -->
    <li class="inline-flex items-center">
      <Link
        href="/admin/dashboard"
        class="flex items-center text-sm text-gray-500 hover:text-red-600
               dark:text-neutral-500 dark:hover:text-red-500"
      >
        Dashboard
      </Link>
      <svg
        v-if="items.length"
        class="shrink-0  size-4 text-gray-400 dark:text-neutral-600"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        viewBox="0 0 24 24"
      >
        <path d="m9 18 6-6-6-6"></path>
      </svg>
    </li>

    <!-- Loop middle items -->
    <li
      v-for="(item, index) in items"
      :key="index"
      class="inline-flex items-center"
    >
      <!-- Last item (no link, bold text) -->
      <span
        v-if="index === items.length - 1"
        class="text-sm capitalize font-semibold text-gray-800 truncate dark:text-neutral-200"
        aria-current="page"
      >
        {{ item.text }}
      </span>

      <!-- Other items (links) -->
      <template v-else>
        <Link
          :href="item.url"
          class="flex capitalize items-center text-sm text-gray-500 hover:text-red-600
                 dark:text-neutral-500 dark:hover:text-red-500"
        >
          {{ item.text }}
        </Link>
        <svg
          class="shrink-0 size-4 text-gray-400 dark:text-neutral-600"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          viewBox="0 0 24 24"
        >
          <path d="m9 18 6-6-6-6"></path>
        </svg>
      </template>
    </li>
  </ol>
</template>
