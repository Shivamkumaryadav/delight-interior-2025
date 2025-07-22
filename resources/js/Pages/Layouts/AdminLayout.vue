<script setup>
import Navbar from "@/components/admin/Navbar.vue";
import Sidebar from "@/components/admin/Sidebar.vue";
</script>

<template>
    <Navbar />
    <Sidebar />
 <div class="p-4 sm:ml-64">
   <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
      <slot></slot>
   </div>
</div>

</template>
