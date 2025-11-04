<script setup lang="ts">
import Input from "@/components/ui/input/Input.vue";
</script>

<template>
    <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3
                        class="text-lg font-bold text-[#333333] mb-6 font-poppins"
                    >
                        Profile
                    </h3>
                    <div class="flex items-center gap-6 mb-6">
                        <div class="relative">
                            <div
                                class="bg-center bg-no-repeat aspect-square bg-cover rounded-full w-20 h-20"
                                data-alt="User avatar"
                                style="
                                    background-image: url(&quot;https://lh3.googleusercontent.com/aida-public/AB6AXuDbnan6153_prPME_ET3kMcbriBZ63l5BFQtPOgpyPJyzMhiRCw5CzM_Gb3JDoObFvbKGHk9tDHDFKD-9Z27tRo2vG8nlHHtTPBk7ThPmbugSzP4dYsKuN8-eil5fjEoACOkdDiqsauGK9Ax81xmZhkki3WfOaGo5SbL3ME7_wmBv7HIpJji4Tc4ESAX0ySHUaEKRHJ6kQEYXSHDmIw645e413FMjPhTP6hmuIASnv8DRQAxGAQjsEffqfeaq9GJdtiQDrA0aKvXIpv&quot;);
                                "
                            ></div>
                            <button
                                class="absolute bottom-0 right-0 bg-[#1ABC9C] text-white rounded-full p-1.5 hover:bg-teal-500"
                            >
                                <span class="material-symbols-outlined text-sm"
                                    >edit</span
                                >
                            </button>
                        </div>
                        <div>
                            <button
                                class="px-4 py-2 bg-[#1ABC9C] text-white text-sm font-semibold rounded-lg"
                            >
                                Change Avatar
                            </button>
                            <button
                                class="px-4 py-2 border border-[#E0E0E0] text-[#666666] text-sm font-semibold rounded-lg ml-2"
                            >
                                Remove
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label
                                class="text-sm font-medium text-[#666666] mb-1 block"
                                >Full Name</label
                            >
                            <Input
                                class="flex py-5 border border-gray-300 focus:broder-0 focus:ring-red-500"
                            />
                        </div>
                        <div>
                            <label
                                class="text-sm font-medium text-[#666666] mb-1 block"
                                >Email Address</label
                            >
                            <Input
                                class="flex py-5 border border-gray-300 focus:broder-0 focus:ring-red-500"
                            />
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button
                            class="h-10 px-6 rounded-xl bg-[#1ABC9C] text-white text-sm font-bold"
                        >
                            Save Changes
                        </button>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3
                        class="text-lg font-bold text-[#333333] mb-6 font-poppins"
                    >
                        Change Password
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label
                                class="text-sm font-medium text-[#666666] mb-1 block"
                                >Current Password</label
                            >
                             <Input
                                class="flex py-5 border border-gray-300 focus:broder-0 focus:ring-red-500"
                            />
                        </div>
                        <div>
                            <label
                                class="text-sm font-medium text-[#666666] mb-1 block"
                                >New Password</label
                            >
                            <Input
                                class="flex py-5 border border-gray-300 focus:broder-0 focus:ring-red-500"
                            />
                        </div>
                        <div class="md:col-span-2">
                            <label
                                class="text-sm font-medium text-[#666666] mb-1 block"
                                >Confirm New Password</label
                            >
                             <Input
                                class="flex py-5 border border-gray-300 focus:broder-0 focus:ring-red-500"
                            />
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button
                            class="h-10 px-6 rounded-xl bg-[#1ABC9C] text-white text-sm font-bold"
                        >
                            Update Password
                        </button>
                    </div>
                </div>
            </div>
            <div class="space-y-8">
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3
                        class="text-lg font-bold text-[#333333] mb-6 font-poppins"
                    >
                        Preferences
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-semibold text-[#333333]">
                                    Theme
                                </p>
                                <p class="text-sm text-[#666666]">
                                    Light / Dark Mode
                                </p>
                            </div>
                            <div class="flex items-center gap-2">
                                <button class="p-2 rounded-lg bg-[#E0E0E0]">
                                    <span
                                        class="material-symbols-outlined text-[#333333]"
                                        >light_mode</span
                                    >
                                </button>
                                <button class="p-2 rounded-lg">
                                    <span
                                        class="material-symbols-outlined text-[#666666]"
                                        >dark_mode</span
                                    >
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-semibold text-[#333333]">
                                    Notifications
                                </p>
                                <p class="text-sm text-[#666666]">
                                    Enable/disable notifications
                                </p>
                            </div>
                            <label class="switch">
                                <input checked="" type="checkbox" />
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3
                        class="text-lg font-bold text-[#333333] mb-6 font-poppins"
                    >
                        Security
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-semibold text-[#333333]">
                                    Two-Factor Authentication
                                </p>
                                <p class="text-sm text-[#666666]">
                                    Keep your account secure.
                                </p>
                            </div>
                        </div>
                        <button
                            class="w-full h-10 px-4 mt-2 rounded-xl bg-[#1ABC9C] text-white text-sm font-bold"
                        >
                            Enable 2FA
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
