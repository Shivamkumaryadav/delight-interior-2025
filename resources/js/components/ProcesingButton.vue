<template>
    <button v-if="!processing"
        type="submit"
        class="cursor-pointer w-full bg-orange-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300"
    >
        <slot></slot>
    </button>
    <!-- disbaled button -->
    <span
        v-if="processing"
        type="submit"
        disabled
        class="flex justify-center gap-5 cursor-not-allowed w-full border border-orange-600 text-orange-600 py-2 px-4 rounded-md transition duration-300"
    >
        <div
            class="animate-spin inline-block size-6 border-3 border-current border-t-transparent text-orange-600 rounded-full"
            role="status"
            aria-label="loading"
        >
            <span class="sr-only">Loading...</span>
        </div>
    </span>
    <!-- disbaled btn end -->
</template>

<script setup>
defineProps({
    processing: {
        type: Boolean,
        default: false,
    },
});
</script>
