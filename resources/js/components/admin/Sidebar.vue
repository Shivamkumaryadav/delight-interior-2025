<template>
  <!-- Mobile toggle button -->
  <button
    @click="isOpen = !isOpen"
    class="fixed top-4 left-4 cursor-pointer z-50 p-2 bg-orange-600 text-white rounded-md sm:hidden"
  >
    <Hamburger/>
  </button>

  <!-- Sidebar Overlay for mobile -->
  <div
    v-if="isOpen"
    @click="isOpen = false"
    class="fixed inset-0 sm:hidden"
  ></div>

  <!-- Sidebar -->
  <aside
    id="logo-sidebar"
    :class="[
      'fixed top-0 left-0 z-50 sm:z-0  w-64 h-screen pt-20 transition-transform bg-white border-r border-gray-200',
      isOpen ? 'translate-x-0' : '-translate-x-full',
      'sm:translate-x-0'
    ]"
    aria-label="Sidebar"
  >
    <div class="h-screen px-3 pb-4 overflow-y-auto ">
      <ul class="space-y-2 font-medium">
        <li v-for="item in items" :key="item.label">
          <Link
            :href="item.url"
            class="flex items-center p-2 hover:text-white hover:bg-orange-600 text-black rounded-lg group"
            @click="isOpen = false"
          >
            <component :is="item.icon" class="w-5 h-5" />
            <span class="ms-3">{{ item.label }}</span>
          </Link>
        </li>
        <Link
          href="/logout"
          as="button"
          method="delete"
          class="w-full cursor-pointer flex items-center p-2 hover:text-white hover:bg-orange-600 text-black rounded-lg group"
          @click="isOpen = false"
        >
          <LogOut />
          <span class="ms-3">Logout</span>
        </Link>
      </ul>
    </div>
  </aside>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from "@inertiajs/vue3";
import { Calculator, FilmIcon, Hamburger, LayoutDashboard, LeafyGreen, LifeBuoy, LogOut, Users } from "lucide-vue-next";

const isOpen = ref(false);

const items = [
  { label: "Dashboard", url: "/admin/dashboard", icon: LayoutDashboard },
  { label: "Categories", url: "/admin/categories", icon: LeafyGreen },
  { label: "Films", url: "/admin/films", icon: FilmIcon },
  { label: "Roles", url: "/admin/roles", icon: LifeBuoy },
  { label: "Users", url: "/admin/users", icon: Users },
  { label: "Calculator", url: "/admin/calculator", icon: Calculator },
];
</script>
