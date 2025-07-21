<script setup lang="ts">
import { SidebarProvider, SidebarTrigger } from "@/components/ui/sidebar";
import AppSidebar from "@/components/AppSidebar.vue";
</script>

<template>
    <SidebarProvider>
        <AppSidebar />

        <main class="w-full bg-[#960016]">
            <SidebarTrigger  class="sticky top-2 z-20 cursor-pointer" />
            <slot />
        </main>
    </SidebarProvider>
</template>
