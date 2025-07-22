<template>
    <Link class="bg-white rounded-xl bg-white px-3 py-2">
        <slot></slot>
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
});
</script>
