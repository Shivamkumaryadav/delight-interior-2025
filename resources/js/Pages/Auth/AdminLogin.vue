<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">
                Admin Login
            </h2>

            <form @submit.prevent="login">
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1" for="email"
                        >Email</label
                    >
                    <Input
                        v-model="form.email"
                        type="email"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                    <ErrorMessage :error="form.errors.email" />
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 mb-1" for="password"
                        >Password</label
                    >
                    <Input
                        v-model="form.password"
                        type="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                    <ErrorMessage :error="form.errors.password" />
                </div>

                <button
                    type="submit"
                    class="cursor-pointer w-full bg-orange-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300"
                >
                    Login
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { Input } from "@/components/ui/input";
import ErrorMessage from "@/components/ErrorMessage.vue";

const form = useForm({
    email: "",
    password: "",
});

function login() {
    form.post("/admin/login", {
        // onError: () => {
        //     form.reset("password");
        // },
    });
}
</script>
