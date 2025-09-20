<script setup >
import ErrorMessage from "@/components/ErrorMessage.vue";
import NavigationLink from "@/components/NavigationLink.vue";
import ProcesingButton from "@/components/ProcesingButton.vue";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import AdminLayout from "@/Pages/Layouts/AdminLayout.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();
const category = computed(() => page.props.category);
const form = useForm({
    name : category.value.name
});

function update()
{
    form.put(`/admin/categories/${category.value.id}`);
}
</script>

<template>
    <AdminLayout>
        <div class="flex font-sans mb-5">
            <h3>Dashboard</h3>
            /categories/{{category.name}}/edit
        </div>

        <div
            class="bg-white border border-gray-200 max-w-lg mx-auto my-16 rounded-lg p-4"
        >
            <div class="mb-10">
                <h3 class="text-xl font-semibold text-center mb-10">
                    Update Category
                </h3>
                <form @submit.prevent="update">
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
                            Update Category
                        </ProcesingButton>
                    </div>
                </form>
            </div>
        </div>

    </AdminLayout>
</template>
