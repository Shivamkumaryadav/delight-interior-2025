<script setup>
import NavigationLink from "@/components/NavigationLink.vue";
import Pagination from "@/components/Pagination.vue";
import AdminLayout from "@/Pages/Layouts/AdminLayout.vue";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();
const categories = computed(() => page.props.categories);
</script>

<template>
    <AdminLayout>
        <div class="flex text-white font-sans mb-5">
            <h3>Dashboard</h3>
            /categories
        </div>

        <div class="flex flex-col">
            <div class="flex justify-between gap-5 items-center my-6">
                <h3 class="text-white text-lg font-semibold">
                    Categories Table
                </h3>
                <NavigationLink href="/admin/categories/create"
                    >Create Category</NavigationLink
                >
            </div>
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="border border-gray-200 rounded-lg divide-y divide-gray-200 bg-white"
                    >
                        <div class="py-3 px-4">
                            <div class="relative max-w-xs">
                                <label for="hs-table-search" class="sr-only"
                                    >Search</label
                                >
                                <input
                                    type="text"
                                    name="hs-table-search"
                                    id="hs-table-search"
                                    class="py-1.5 sm:py-2 px-3 ps-9 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Search for items"
                                />
                                <div
                                    class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3"
                                >
                                    <svg
                                        class="size-4 text-gray-400 dark:text-neutral-500"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.3-4.3"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            <table
                                class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700"
                            >
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3 px-4 pe-0">
                                            <div
                                                class="flex items-center h-5 hidden"
                                            >
                                                <input
                                                    id="hs-table-search-checkbox-all"
                                                    type="checkbox"
                                                    class="border-gray-200 rounded-sm text-blue-600 focus:ring-blue-500 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                />
                                                <label
                                                    for="hs-table-search-checkbox-all"
                                                    class="sr-only"
                                                    >Checkbox</label
                                                >
                                            </div>
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500"
                                        >
                                            Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500"
                                        >
                                            Age
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500"
                                        >
                                            Address
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500"
                                        >
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody v-if="categories.data.length"
                                    class="divide-y divide-gray-200 dark:divide-neutral-700"
                                >
                                    <tr
                                        v-for="category in categories.data"
                                        :key="category.id"
                                    >
                                        <td class="py-3 ps-4">
                                            <div class="flex items-center h-5">
                                                <input
                                                    id="hs-table-search-checkbox-1"
                                                    type="checkbox"
                                                    class="border-gray-200 rounded-sm text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                />
                                                <label
                                                    for="hs-table-search-checkbox-1"
                                                    class="sr-only"
                                                    >Checkbox</label
                                                >
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"
                                        >
                                            {{ category.name }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"
                                        >
                                            45
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"
                                        >
                                            {{ category.created_at }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium"
                                        >
                                            <button
                                                type="button"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400"
                                            >
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Pagination :links="categories"/>
    </AdminLayout>
</template>
