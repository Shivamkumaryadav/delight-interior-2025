<script setup lang="ts">
import {
    Calendar,
    Home,
    Inbox,
    LayoutDashboard,
    LeafyGreen,
    LogOut,
    Search,
    Settings,
} from "lucide-vue-next";
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarGroup,
    SidebarGroupContent,
    SidebarGroupLabel,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from "@/components/ui/sidebar";

// Menu items.
const items = [
    {
        title: "Dashboard",
        url: "/admin/dashboard",
        icon: LayoutDashboard,
    },
    {
        title: "Categories",
        url: "/admin/categories",
        icon: LeafyGreen,
    },
    {
        title: "Calendar",
        url: "#",
        icon: Calendar,
    },
    {
        title: "Search",
        url: "#",
        icon: Search,
    },
    {
        title: "Settings",
        url: "#",
        icon: Settings,
    },
];
</script>

<template>
    <Sidebar class=" bg-[#960016] text-white" collapsible="icon">
        <SidebarContent>
            <SidebarGroup class=" bg-[#960016] text-white h-screen">
                <SidebarGroupLabel class="text-white text-xl text-center uppercase my-5"
                    >Delight Interior</SidebarGroupLabel
                >
                <SidebarGroupContent>
                    <SidebarMenu>
                        <SidebarMenuItem
                            v-for="item in items"
                            :key="item.title"
                        >
                            <SidebarMenuButton asChild>
                                <a :href="item.url">
                                    <component :is="item.icon" />
                                    <span>{{ item.title }}</span>
                                </a>
                            </SidebarMenuButton>
                        </SidebarMenuItem>
                    </SidebarMenu>
                </SidebarGroupContent>
            </SidebarGroup>
        </SidebarContent>
        <!-- footer sidebar -->
        <SidebarFooter class=" bg-[#960016] text-white">
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton> <LogOut /> Logout </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarFooter>
    </Sidebar>
</template>
