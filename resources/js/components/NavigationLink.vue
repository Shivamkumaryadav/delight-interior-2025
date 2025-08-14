<template>
    <Link
        class="bg-red-500 rounded-xl px-3 py-2 transition-all duration-300 ease-in-out transform hover:scale-101 hover:bg-red-600 hover:shadow-lg active:scale-95"
    >
        <slot></slot>
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
