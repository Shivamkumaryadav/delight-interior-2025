<script setup>
import ErrorMessage from "@/components/ErrorMessage.vue";
import NavigationLink from "@/components/NavigationLink.vue";
import ProcesingButton from "@/components/ProcesingButton.vue";
import SelectInput from "@/components/SelectInput.vue";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import AdminLayout from "@/Pages/Layouts/AdminLayout.vue";
import { useForm, usePage } from "@inertiajs/vue3";

const page = usePage();
const roles = page.props.roles;

const form = useForm({
    name: "",
    email: "",
    password: "",
    role: null,
});
function store() {
    form.post("/admin/users");
}
</script>

<template>
    <AdminLayout>
        <div class="flex text-white font-sans mb-5">
            <h3>Dashboard</h3>
            /users/create
        </div>

        <div class="bg-white max-w-lg mx-auto mt-16 rounded-lg p-4">
            <h3 class="text-xl font-semibold text-center uppercase">
                Create new User
            </h3>
            <form @submit.prevent="store" class="space-y-5">
                <div class="space-y-1">
                    <Label for="name">Name</Label>
                    <Input class="py-5.5" v-model="form.name" />
                    <ErrorMessage :error="form.errors.name" />
                </div>
                <div class="space-y-1">
                    <Label for="name">Email</Label>
                    <Input class="py-5.5" v-model="form.email" type="email" />
                    <ErrorMessage :error="form.errors.email" />
                </div>
                 <div class="space-y-1">
                    <Label for="password">Password</Label>
                    <Input class="py-5.5" v-model="form.password" type="password" />
                    <ErrorMessage :error="form.errors.password" />
                </div>
                <div class="space-y-1 flex-1">
                    <SelectInput
                        class=""
                        v-model="form.role"
                        :options="roles"
                        option-label="name"
                        option-value="id"
                        label="User Role"
                        name="name"
                        id="film"
                        placeholder="Please select a role"
                    />
                    <ErrorMessage :error="form.errors.role" />
                </div>
                <div class="mt-6">
                    <ProcesingButton :processing="form.processing">Create User</ProcesingButton>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
