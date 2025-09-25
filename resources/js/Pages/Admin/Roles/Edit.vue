<script setup >
import ErrorMessage from "@/components/ErrorMessage.vue";
import NavigationLink from "@/components/NavigationLink.vue";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import AdminLayout from "@/Pages/Layouts/AdminLayout.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { computed } from "vue";


const page = usePage();
const role = computed(() => page.props.role.data);

const form = useForm({
    name : role.value.name
})
function update()
{
    form.put(`/admin/roles/${role.value.id}`);
}
</script>

<template>
        <div class="flex text-white font-sans mb-5">
            <h3>Dashboard</h3>
            /roles/{{ role.id }}/edit
        </div>

        <div class="bg-white max-w-lg mx-auto mt-16 rounded-lg p-4">
            <h3 class="text-xl font-semibold text-center uppercase">Update  role</h3>
            <form @submit.prevent="update">
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
                    Update Role
                </button>
              </div>
            </form>
        </div>

</template>
