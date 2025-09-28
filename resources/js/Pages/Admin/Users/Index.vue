<script setup>
import NavigationLink from "@/components/NavigationLink.vue";
import Pagination from "@/components/Pagination.vue";
import AdminLayout from "@/Pages/Layouts/AdminLayout.vue";
import { Link, usePage, router } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import Modal from "@/components/Modal.vue";
import Breadcumb from "@/components/Breadcumb.vue";
import { Pencil, Trash2 } from "lucide-vue-next";

const page = usePage();
const users = computed(() => page.props.users);

// Modal state
const showModal = ref(false);
const selectedUser = ref(null);

function openDeleteModal(user) {
    selectedUser.value = user;
    showModal.value = true;
}

function handleCancel() {
    showModal.value = false;
    selectedUser.value = null;
}

function handleDelete() {
    if (selectedUser.value) {
        router.delete(`/admin/users/${selectedUser.value.id}`, {
            onFinish: () => {
                showModal.value = false;
                selectedUser.value = null;
            },
        });
    }
}
</script>

<template>
    <div class="flex text-white font-sans mb-5">
        <Breadcumb :items="[{ text: 'users', url: '/admin/users' }]" />
    </div>

    <div class="flex flex-col">
        <div class="flex justify-between gap-5 items-center my-6">
            <h3 class="text-white text-lg font-semibold">Users Table</h3>
            <NavigationLink href="/admin/users/create"
                >Create users</NavigationLink
            >
        </div>

        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div
                    class="border border-gray-200 rounded-lg divide-y divide-gray-200 bg-white"
                >
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th></th>
                                    <th
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                    >
                                        User Name
                                    </th>
                                    <th
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Role Name
                                    </th>
                                    <th
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Created At
                                    </th>
                                    <th
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Updated At
                                    </th>
                                    <th
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody
                                v-if="users.data.length"
                                class="divide-y divide-gray-200"
                            >
                                <tr v-for="user in users.data" :key="user.id">
                                    <td></td>
                                    <td class="px-6 py-4">
                                        {{ user.username }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ user.role?.name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ user.created_at }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ user.updated_at }}
                                    </td>
                                    <td class="px-6 flex items-center gap-3 justify-end py-4 text-end space-x-3">
                                        <Link
                                            :href="`/admin/users/${user.id}/edit`"
                                        >
                                            <Pencil class="w-5" />
                                        </Link>
                                        <button
                                            type="button"
                                            @click="openDeleteModal(user)"
                                            class="text-red-600 hover:text-red-800"
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

    <!-- <Pagination :links="users.links" /> -->
    <!-- <Pagination :meta="users.meta" :links="users.links" /> -->
    <!-- Pagination -->
    <!-- <Pagination :meta="users.meta" :links="users.links" /> -->

    <Pagination :pagination="users" />

    <!-- Delete Confirmation Modal -->
    <Modal v-model="showModal" @cancel="handleCancel" @delete="handleDelete">
        <template #title>Delete User</template>
        <template #message>
            Are you sure you want to delete
            <span class="font-semibold">{{ selectedUser?.username }}</span
            >? This action cannot be undone.
        </template>
        <template #footer>
            <button
                @click="handleDelete"
                class="cursor-pointer bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-500"
            >
                Delete
            </button>
            <button
                @click="handleCancel"
                class="cursor-pointer bg-gray-200 px-4 py-2 rounded-md text-sm font-medium text-gray-800 hover:bg-gray-300"
            >
                Cancel
            </button>
        </template>
    </Modal>
</template>
