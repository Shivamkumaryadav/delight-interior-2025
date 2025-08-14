<template>
    <!-- Active Button -->
    <button
        v-if="!processing"
        type="submit"
        class="cursor-pointer w-full bg-red-500 text-white font-semibold py-2 px-4 rounded-md transition-all duration-300 hover:bg-red-500 hover:scale-101 "
    >
        <slot></slot>
    </button>

    <!-- Disabled Button -->
    <span
        v-if="processing"
        disabled
        class="flex justify-center gap-5 cursor-not-allowed w-full border border-red-500 text-red-500 py-2 px-4 rounded-md transition duration-300"
    >
        <div
            class="animate-spin inline-block size-6 border-3 border-current border-t-transparent text-red-500 rounded-full"
            role="status"
            aria-label="loading"
        >
            <span class="sr-only">Loading...</span>
        </div>
    </span>
</template>

<script setup>
defineProps({
    processing: {
        type: Boolean,
        default: false,
    },
});
</script>
