<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
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
                        class="w-full px-4 py-6 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                    />
                    <ErrorMessage :error="form.errors.email" />
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 mb-1" for="password"
                        >Password</label
                    >
                    <div class="relative">
                        <Input
                            v-model="form.password"
                            :type="passInputType"
                            class="w-full px-4 py-6 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                        />
                        <!-- show and hide password eye button -->
                        <span
                            class="absolute inset-y-0 right-3 flex items-center  "
                        >
                            <Eye
                                title="Hide Password"
                                v-if="passInputType === 'text'"
                                class="w-4 cursor-pointer"
                                @click="hidePassword"
                            />
                            <EyeOff
                                title="Show Password"
                                class="w-4 cursor-pointer"
                                v-else
                                @click="showPassword"
                            />
                        </span>
                    </div>

                    <ErrorMessage :error="form.errors.password" />
                </div>
                <ProcesingButton :processing="form.processing"
                    >Login
                </ProcesingButton>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { Input } from "@/components/ui/input";
import ErrorMessage from "@/components/ErrorMessage.vue";
import { Eye, EyeOff } from "lucide-vue-next";
import { ref } from "vue";
import ProcesingButton from "@/components/ProcesingButton.vue";

const form = useForm({
    email: "",
    password: "",
});

// handle show and hide the password eye
const passInputType = ref("password");

const showPassword = () => {
    passInputType.value = "text";
};

const hidePassword = () => {
    passInputType.value = "password";
};

function login() {
    form.post("/admin/login", {
        onError: () => {
            form.reset("password");
        },
    });
}
</script>
