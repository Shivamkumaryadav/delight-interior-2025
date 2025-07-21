<template>
    <p v-if="error" class="text-red-600 text-sm">
        {{ error }}
    </p>
</template>

<script setup>
defineProps({
    error: {
        type: Object,
        required: true
    }
})
</script>