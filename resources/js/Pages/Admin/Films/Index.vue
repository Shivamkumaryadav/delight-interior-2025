<template>
    <div>
        <!-- Header -->
        <div class="flex font-sans mb-5">
            <Breadcumb :items="[{ text: 'films', url: '/admin/films' }]" />
        </div>

        <!-- Films Table -->
        <div class="flex flex-col">
            <div class="flex justify-between gap-5 items-center my-6">
                <h3 class="text-lg font-semibold">Films Table</h3>
                <NavigationLink href="/admin/films/create" class="text-white">
                    Create Film
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
                                        <th
                                            scope="col"
                                            class="py-3 px-4 pe-0"
                                        ></th>
                                        <th
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                        >
                                            Name
                                        </th>
                                        <th
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                        >
                                            UV Rejection (%)
                                        </th>
                                        <th
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                        >
                                            Thickness (mm)
                                        </th>
                                        <th
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                        >
                                            Warranty (years)
                                        </th>
                                        <th
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                                        >
                                            Price
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
                                            colspan="2"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"
                                        >
                                            Action
                                        </th>
                                    </tr>
                                </thead>

                                <tbody
                                    v-if="films.length"
                                    class="divide-y divide-gray-200 dark:divide-neutral-700"
                                >
                                    <tr v-for="film in films" :key="film.id">
                                        <td class="py-3 ps-4">
                                            <input
                                                type="checkbox"
                                                class="border-gray-200 rounded-sm text-blue-600"
                                            />
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm font-medium text-gray-800"
                                        >
                                            {{ film.name }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-gray-800"
                                        >
                                            {{ film.uv_rejection }}%
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-gray-800"
                                        >
                                            {{ film.thickness }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-gray-800"
                                        >
                                            {{ film.warranty }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-gray-800"
                                        >
                                            {{ film.price }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-gray-800"
                                        >
                                            {{ film.created_at }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-gray-800"
                                        >
                                            {{ film.updated_at }}
                                        </td>
                                        <td
                                            class="px-6 flex items-center gap-3 py-4 text-end text-sm font-medium space-x-3"
                                        >
                                            <Link
                                                :href="`/admin/films/${film.id}/edit`"
                                            >
                                                <Pencil class="w-5" />
                                            </Link>
                                            <button
                                                type="button"
                                                @click="openDeleteModal(film)"
                                                class="text-red-600 hover:text-red-800 font-semibold text-sm"
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

        <!-- pagination -->
        <Pagination :links="categories" />

        <!-- Modal -->
        <Teleport to="body">
            <Modal
                v-model="showModal"
                @cancel="handleCancel"
                @delete="handleDelete"
            >
            </Modal>
        </Teleport>
    </div>
</template>

<script setup>
import Breadcumb from "@/components/Breadcumb.vue";
import Modal from "@/components/Modal.vue";
import NavigationLink from "@/components/NavigationLink.vue";
import AdminLayout from "@/Pages/Layouts/AdminLayout.vue";
import { Link, usePage, router } from "@inertiajs/vue3";
import { debounce } from "lodash";
import { Pencil, Trash2 } from "lucide-vue-next";
import { computed, ref, watch } from "vue";

const page = usePage();
const films = computed(() => page.props.films.data);
const search = ref(page.props.search ?? '');

const showModal = ref(false);
const filmToDelete = ref(null);

//function to search
watch(
  search,
  debounce((value) => {
    router.get(
      "/admin/films",
      { search: value },
      { preserveState: true, preserveScroll: true }
    );
  }, 300) // wait 300ms after user stops typing
);


function openDeleteModal(film) {
    filmToDelete.value = film;
    showModal.value = true;
}

function handleCancel() {
    filmToDelete.value = null;
    showModal.value = false;
}

function handleDelete() {
    if (!filmToDelete.value) return;

    router.delete(`/admin/films/${filmToDelete.value.id}`, {
        onSuccess: () => {
            showModal.value = false;
            filmToDelete.value = null;
        },
    });
}
</script>
