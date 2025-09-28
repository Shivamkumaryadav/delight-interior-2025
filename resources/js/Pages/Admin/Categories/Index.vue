<script setup>
import NavigationLink from "@/components/NavigationLink.vue";
import Pagination from "@/components/Pagination.vue";
import Modal from "@/components/Modal.vue";
import { Link, usePage, router } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";
import Breadcumb from "@/components/Breadcumb.vue";
import { debounce } from "lodash";
import { Pencil, Trash2 } from "lucide-vue-next";

const page = usePage();
const categories = computed(() => page.props.categories);
const search = ref(page.props.search ?? "");

const showModal = ref(false);
const categoryToDelete = ref(null);

//function to search
watch(
  search,
  debounce((value) => {
    router.get(
      "/admin/categories",
      { search: value },
      { preserveState: true, preserveScroll: true }
    );
  }, 300) // wait 300ms after user stops typing
);


function confirmDelete(category) {
    categoryToDelete.value = category;
    showModal.value = true;
}

function handleCancel() {
    showModal.value = false;
    categoryToDelete.value = null;
}

function handleDelete() {
    if (categoryToDelete.value) {
        router.delete(`/admin/categories/${categoryToDelete.value.id}`, {
            onFinish: () => {
                showModal.value = false;
                categoryToDelete.value = null;
            },
        });
    }
}
</script>

<template>
    <div class="flex font-sans mb-5">
        <Breadcumb
            :items="[{ text: 'Categories', url: '/admin/categories' }]"
        />
    </div>

    <div class="flex flex-col">
        <div class="flex justify-between gap-5 items-center my-6">
            <h3 class="text-lg font-semibold">Categories Table</h3>
            <NavigationLink href="/admin/categories/create" class="text-white">
                Create Category
            </NavigationLink>
        </div>

        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div
                    class="border border-gray-200 rounded-lg divide-y divide-gray-200 bg-white"
                >
                    <!-- Search -->
                    <div class="py-3 px-4">
                        <div class="relative max-w-xs">
                            <label for="hs-table-search" class="sr-only"
                                >Search</label
                            >
                            <input
                                v-model="search"
                                type="text"
                                name="hs-table-search"
                                id="hs-table-search"
                                class="py-1.5 sm:py-2 px-3 ps-9 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Search for items"
                            />
                            <div
                                class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3"
                            >
                                <svg
                                    class="size-4 text-gray-400"
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

                    <!-- Table -->
                    <div class="overflow-hidden">
                        <table
                            class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700"
                        >
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-4 pe-0"></th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Name
                                    </th>

                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Created At
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody
                                v-if="categories.data.length"
                                class="divide-y divide-gray-200"
                            >
                                <tr
                                    v-for="category in categories.data"
                                    :key="category.id"
                                >
                                    <td class="py-3 ps-4">
                                        <input
                                            type="checkbox"
                                            class="border-gray-200 rounded-sm text-blue-600 focus:ring-blue-500"
                                        />
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm font-medium text-gray-800"
                                    >
                                        {{ category.name }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-800">
                                        {{ category.created_at }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-end text-sm space-x-3 font-medium"
                                    >
                                        <Link
                                            :href="`/admin/categories/${category.id}/edit`"
                                            class="inline-flex  items-center gap-x-2 text-sm font-semibold text-blue-600 hover:text-blue-800"
                                        >
                                            <Pencil class="w-5" />
                                        </Link>
                                        <button
                                            type="button"
                                            @click="confirmDelete(category)"
                                            class="inline-flex items-center gap-x-2 text-sm font-semibold text-red-600 hover:text-red-600 cursor-pointer"
                                        >
                                            <Trash2 class="w-5"/>
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

    <!-- <Pagination :links="categories" /> -->

    <!-- Modal Teleported to body -->
    <teleport to="body">
        <Modal
            v-model="showModal"
            @cancel="handleCancel"
            @delete="handleDelete"
        >
            <template #title>Delete Category</template>
            <template #message>
                Are you sure you want to delete
                <span class="font-semibold">{{ categoryToDelete?.name }}</span
                >?
            </template>
        </Modal>
    </teleport>
</template>
