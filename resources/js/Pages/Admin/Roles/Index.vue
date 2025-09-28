<script setup>
import NavigationLink from "@/components/NavigationLink.vue";
import Pagination from "@/components/Pagination.vue";
import Modal from "@/components/Modal.vue";
import { Link, usePage, router } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import Breadcumb from "@/components/Breadcumb.vue";
import { Pencil, Trash2 } from "lucide-vue-next";

const page = usePage();
const roles = computed(() => page.props.roles);

const showModal = ref(false);
const roleToDelete = ref(null);

function confirmDelete(role) {
    roleToDelete.value = role;
    showModal.value = true;
}

function handleCancel() {
    showModal.value = false;
    roleToDelete.value = null;
}

function handleDelete() {
    if (roleToDelete.value) {
        router.delete(`/admin/roles/${roleToDelete.value.id}`, {
            onFinish: () => {
                showModal.value = false;
                roleToDelete.value = null;
            },
        });
    }
}
</script>

<template>
    <div class="flex text-white font-sans mb-5">
        <Breadcumb :items="[{ text: 'roles', url: '/admin/roles' }]" />
    </div>

    <div class="flex flex-col">
        <div class="flex justify-between gap-5 items-center my-6">
            <h3 class="text-white text-lg font-semibold">Roles Table</h3>
            <NavigationLink href="/admin/roles/create"
                >Create Roles</NavigationLink
            >
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
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-4 pe-0"></th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Role Name
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Created At
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Updated At
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
                                v-if="roles.data.length"
                                class="divide-y divide-gray-200"
                            >
                                <tr v-for="role in roles.data" :key="role.id">
                                    <td class="py-3 ps-4">
                                        <input
                                            type="checkbox"
                                            class="border-gray-200 rounded-sm text-blue-600 focus:ring-blue-500"
                                        />
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                                    >
                                        {{ role.name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"
                                    >
                                        {{ role.created_at }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"
                                    >
                                        {{ role.updated_at }}
                                    </td>
                                    <td
                                        class="px-6 py-4 flex items-center gap-3 justify-end whitespace-nowrap text-end text-sm font-medium space-x-3"
                                    >
                                        <Link
                                            :href="`/admin/roles/${role.id}/edit`"
                                            >
                                            <Pencil class="w-5" />
                                            </Link
                                        >
                                        <button
                                            type="button"
                                            @click="confirmDelete(role)"
                                            class="inline-flex items-center gap-x-2 text-sm font-semibold text-red-600 hover:text-red-800"
                                        >
                                            <Trash2 class="w-5" />
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

    <!-- <Pagination :links="roles" /> -->

    <!-- Teleported Modal -->
    <teleport to="body">
        <Modal
            v-model="showModal"
            @cancel="handleCancel"
            @delete="handleDelete"
        >
            <template #title>Delete Role</template>
            <template #message>
                Are you sure you want to delete
                <span class="font-semibold">{{ roleToDelete?.name }}</span
                >?
            </template>
        </Modal>
    </teleport>
</template>
