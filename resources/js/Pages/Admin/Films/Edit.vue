<script setup>
import ErrorMessage from "@/components/ErrorMessage.vue";
import NavigationLink from "@/components/NavigationLink.vue";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import AdminLayout from "@/Pages/Layouts/AdminLayout.vue";
import { useForm, usePage } from "@inertiajs/vue3";

import SelectInput from "@/components/SelectInput.vue";
import { computed } from "vue";
import Summernote from "@/components/admin/Summernote.vue";

const page = usePage();
const film = computed(() => page.props.film);
const form = useForm({
    name: film.value.name,
    price: film.value.price,
    category: film.value.category,
    description: film.value.description,
    thickness: film.value.thickness,
    uv_rejection: film.value.uv_rejection,
    warranty : film.value.warranty
});
function store() {
    form.put(`/admin/films/${film.id}`);
}
</script>

<template>
    <AdminLayout>
        <div class="flex text-white font-sans mb-5">
            <h3>Dashboard</h3>
            /films/create
        </div>

        <div class="bg-white max-w-l mt-16 rounded-lg p-4">
            <h3 class="text-2xl font-semibold text-center uppercase">
                Create new Film
            </h3>
            <form @submit.prevent="store">
                <div class="space-y-5 md:space-y-0 md:flex gap-x-32 my-5">
                    <div class="space-y-1 flex-1">
                        <Label for="name">Name</Label>
                        <Input class="flex" v-model="form.name" />
                        <ErrorMessage :error="form.errors.name" />
                    </div>
                    <div class="space-y-1 flex-1">
                        <Label for="price">Price</Label>
                        <Input
                            class="flex"
                            v-model="form.price"
                            placeholder="Film price"
                        />
                        <ErrorMessage :error="form.errors.price" />
                    </div>
                </div>
                <div class="space-y-5 md:space-y-0 md:flex gap-x-32 my-5">
                    <div class="space-y-1 flex-1">
                        <Label for="thickness">Thickness</Label>
                        <Input class="flex" v-model="form.thickness" />
                        <ErrorMessage :error="form.errors.thickness" />
                    </div>
                    <div class="space-y-1 flex-1">
                        <Label for="uv-rejection">Uv Rejection</Label>
                        <Input class="flex" v-model="form.uv_rejection" />
                        <ErrorMessage :error="form.errors.uv_rejection" />
                    </div>
                </div>


                <div class="space-y-5 md:space-y-0 md:flex gap-x-32 my-5">
                    <SelectInput
                        class="flex-1"
                        v-model="form.category"
                        :options="categories"
                        option-label="name"
                        option-value="id"
                        label="Category"
                        name="name"
                        id="category"
                        placeholder="Please select a category"
                    />

                    <div class="space-y-1 flex-1">
                        <Label for="warranty">Warranty</Label>
                        <Input class="flex" v-model="form.warranty" />
                        <ErrorMessage :error="form.errors.warranty" />
                    </div>
                </div>

                <div class="space-y-1">
                    <Label for="Description">Description</Label>
                    <Summernote v-model="form.description" />
                    <ErrorMessage :error="form.errors.description" />
                </div>

                <div class="mt-6 flex justify-between gap-6">
                    <NavigationLink href="/admin/films" class="text-center border cursor-pointer w-full bg-red-800  font-semibold py-2 px-4 rounded-md transition duration-300">Cancel</NavigationLink>
                    <button
                        type="submit"
                        class="cursor-pointer w-full bg-red-800 text-white font-semibold py-2 px-4 rounded-md transition duration-300"
                    >
                        Update Film
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
