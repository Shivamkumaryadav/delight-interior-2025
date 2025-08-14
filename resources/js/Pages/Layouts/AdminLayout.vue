<script setup>
import Navbar from "@/components/admin/Navbar.vue";
import Sidebar from "@/components/admin/Sidebar.vue";
import { usePage } from "@inertiajs/vue3";
import { ref, watch } from "vue";

const page = usePage();
const sessionMessage = ref(page.props.session_success ?? null);

// Watch for changes in the session message and hide after 5 seconds
watch(
    () => page.props.session_success,
    (newVal) => {
        sessionMessage.value = newVal;
        if (newVal) {
            setTimeout(() => {
                sessionMessage.value = null;
            }, 5000);
        }
    },
    { immediate: true }
);
</script>

<template>
    <div class="bg-[#fafafa] bgred-500 flex flex-col h-screen gap-1">
        <Navbar />
        <Sidebar />
        <div class="p-4 sm:ml-64 flex-1">
            <div class=" rounded-lg mt-14">
                <slot></slot>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <!-- Session flash success message -->
            <transition name="fade">
                <div
                    v-if="sessionMessage"
                    class="fixed bottom-6 right-8 text-white rounded-full shadow-lg"
                >
                    <div class="px-4 py-2 rounded-full bg-red-500">
                        {{ sessionMessage }}
                    </div>
                </div>
            </transition>
        </footer>
    </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
