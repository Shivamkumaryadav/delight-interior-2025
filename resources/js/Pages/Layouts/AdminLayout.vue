<script setup>
import Navbar from "@/components/admin/Navbar.vue";
import Sidebar from "@/components/admin/Sidebar.vue";
</script>

<template>
    <div class="bg-[#fafafa]">
        <Navbar />
        <Sidebar />
        <div class="p-4 sm:ml-64">
            <div class="p-4 rounded-lg mt-14">
                <slot></slot>
            </div>
        </div>

        <!-- footer -->
        <footer>
            <!-- session flash success and error message -->
            <div class="fixed bottom-6 right-4">
                <div class="px-3 py-2 bg-red-500"></div>
            </div>
        </footer>
    </div>
</template>
