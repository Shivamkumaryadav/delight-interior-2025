<script setup >
import ErrorMessage from "@/components/ErrorMessage.vue";
import NavigationLink from "@/components/NavigationLink.vue";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import AdminLayout from "@/Pages/Layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name : ''
})
function store()
{
    form.post('/admin/roles');
}
</script>

<template>
    <AdminLayout>
        <div class="flex text-white font-sans mb-5">
            <h3>Dashboard</h3>
            /roles/create
        </div>

        <div class="bg-white max-w-lg mx-auto mt-16 rounded-lg p-4">
            <h3 class="text-xl font-semibold text-center uppercase">Create new role</h3>
            <form @submit.prevent="store">
                <div class="space-y-1">
                    <Label for="name">Name</Label>
                    <Input v-model="form.name"/>
                    <ErrorMessage :error="form.errors.name" />

                </div>
              <div class="mt-6">
                  <button
                    type="submit"
                    class="cursor-pointer w-full bg-red-800 text-white font-semibold py-2 px-4 rounded-md transition duration-300"
                >
                    Create Role
                </button>
              </div>
            </form>
        </div>

    </AdminLayout>
</template>
