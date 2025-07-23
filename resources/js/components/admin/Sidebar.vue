<template>
    <aside
        id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-sidebar border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar"
    >
        <div
            class="h-full px-3 pb-4 overflow-y-auto bg-red-800dark:bg-gray-800"
        >
            <ul class="space-y-2 font-medium">
                <li v-for="item in items" :key="item.label">
                    <Link
                        :href="item.url"
                        class="flex items-center p-2 text-white hover:text-black rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                    >
                        <component :is="item.icon" class="w-5 h-5" />
                        <span class="ms-3">{{ item.label }}</span>
                    </Link>
                </li>
            </ul>
        </div>
    </aside>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { Calculator, FilmIcon, LayoutDashboard, LeafyGreen, LifeBuoy, Users } from "lucide-vue-next";

const items = [
    {
        label: "Dashboard",
        url: "/admin/dashboard",
        icon: LayoutDashboard,
    },
    {
        label: "Categories",
        url: "/admin/categories",
        icon: LeafyGreen,
    },
    {
        label: "Films",
        url: "/admin/films",
        icon: FilmIcon,
    },
    {
        label: "Roles",
        url: "/admin/roles",
        icon: LifeBuoy,
    },
    {
        label: "Users",
        url: "/admin/users",
        icon: Users,
    },
    {
        label: "Calculator",
        url: "/admin/calculator",
        icon: Calculator,
    },
];
</script>
