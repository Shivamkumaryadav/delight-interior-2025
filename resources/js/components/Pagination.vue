<template >
    <nav v-if="links.total > links.per_page" v-show="links.links"
        class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
        aria-label="Table navigation">
        <span class="text-sm font-normal text-white">
            Showing
            <span class="font-semibold text-white ">{{ links.from }} - {{
                links.to }}</span>
            of
            <span class="font-semibold text-white ">{{ links.total }}</span>
        </span>
        <div class="flex gap-2">
            <div class="space-x-5" v-for="link in links.links">
                <Link v-if="link.url && !link.active" :href="link.url" v-html="link.label"
                    class="bg-gray-100 rounded px-2 py-1 hover:bg-indigo-700 hover:text-white">
                </Link>
                <span v-if="!link.url || link.active" v-html="link.label"
                    class="cursor-not-allowed bg-gray-100 rounded px-2 py-1 "
                    :class="{ 'bg-indigo-700 text-white': link.active }"></span>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    links : Object
})
</script>
