<template>
    <!-- disbaled button -->
    <span v-if="processing"
        type="submit"
        disabled
        class="flex justify-center gap-5 cursor-not-allowed w-full bg-gray-300 text-gray-500 py-2 px-4 rounded-md transition duration-300"
    >
        <div
            class="animate-spin inline-block size-6 border-3 border-current border-t-transparent text-blue-600 rounded-full"
            role="status"
            aria-label="loading"
        >
            <span class="sr-only">Loading...</span>
        </div>
        <slot></slot>
    </span>
    <!-- disbaled btn end -->
</template>

<script setup>
defineProps({
    processing:{
        type : Boolean,
        default: false
    }
});
</script>
