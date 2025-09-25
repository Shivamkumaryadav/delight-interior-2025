<template>
  <div class="w-full h-screen">
    <h1 class="text-xl font-bold mb-4">Generated Invoice</h1>

    <!-- Display PDF -->
    <iframe
      v-if="pdfUrl"
      :src="pdfUrl"
      class="w-full h-[90vh] border"
    ></iframe>

    <!-- Optional: message when PDF not yet generated -->
    <div v-else>
      <p>No invoice generated yet.</p>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const pdfUrl = computed(() => page.props.pdf_url);
</script>

<style scoped>
iframe {
  border: 1px solid #ccc;
}
</style>
