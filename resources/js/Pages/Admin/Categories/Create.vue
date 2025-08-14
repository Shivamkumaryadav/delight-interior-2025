<script setup>
import ErrorMessage from "@/components/ErrorMessage.vue";
import NavigationLink from "@/components/NavigationLink.vue";
import ProcesingButton from "@/components/ProcesingButton.vue";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import AdminLayout from "@/Pages/Layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
});
function store() {
    form.post("/admin/categories");
}
</script>

<template>
    <AdminLayout>
        <div class="flex font-sans mb-5">
            <h3>Dashboard</h3>
            /categories/create
        </div>

        <div
            class="bg-white border border-gray-200 max-w-lg mx-auto my-16 rounded-lg p-4"
        >
            <div class="mb-10">
                <h3 class="text-xl font-semibold text-center mb-10">
                    Create new Category
                </h3>
                <form @submit.prevent="store">
                    <div class="space-y-1">
                        <Label for="name">Name</Label>
                        <Input
                            class="py-5 border border-gray-300 focus:broder-0 focus:ring-red-500"
                            v-model="form.name"
                        />
                        <ErrorMessage :error="form.errors.name" />
                    </div>
                    <div class="mt-6">
                        <ProcesingButton :processing="form.processing">
                            Create Category
                        </ProcesingButton>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
