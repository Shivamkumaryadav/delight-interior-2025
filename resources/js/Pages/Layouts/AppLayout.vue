<template>
  <div class="flex flex-col h-screen">
    <!-- navbar -->
    <div
      class="bg-white text-gray-600 px-5 md:px-10 py-4 border-b border-gray-300 sticky top-0 z-50"
    >
      <div class="flex justify-between items-center">
        <div>
          <Link href="/" class="lg:text-xl font-bold uppercase"
            >Delight Interior</Link
          >
        </div>

        <div>
          <!-- Desktop Menu -->
          <div class="hidden md:flex items-center justify-start gap-6">
            <div>
              <Link href="/">Home</Link>
              <div
                class="w-auto bg-red-600 h-[5px] rounded-tl-2xl rounded-br-2xl"
              ></div>
            </div>
            <div>
              <Link href="/films">
                <div class="text-[#B22A42]">Films</div>
                <div
                  class="bg-red-600 h-[5px] rounded-tl-xl rounded-br-xl"
                ></div>
              </Link>
            </div>
          </div>

          <!-- Mobile Hamburger -->
          <div class="md:hidden">
            <button @click="toggleMenu">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="lucide lucide-align-left-icon lucide-align-left"
              >
                <path d="M15 12H3" />
                <path d="M17 18H3" />
                <path d="M21 6H3" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- mobile navbar -->
    <transition name="slide">
      <div
        v-if="isMobileMenuOpen"
        class="fixed inset-0 z-50 bg-white p-6 overflow-y-auto flex flex-col"
      >
        <!-- close button -->
        <div class="flex justify-end ">
          <button @click="toggleMenu">
            <X class="w-6 h-6" />
          </button>
        </div>

        <!-- center menu links -->
        <div class="flex flex-col items-center justify-center flex-1 gap-16">
          <Link href="#" class="text-gray-800 font-medium text-lg">Home</Link>
          <Link href="#" class="text-gray-800 font-medium text-lg">Films</Link>
          <Link href="#" class="text-gray-800 font-medium text-lg">Services</Link>
          <Link href="#" class="text-gray-800 font-medium text-lg">About</Link>
        </div>
      </div>
    </transition>

    <!-- main content -->
    <div class="flex-1 px-5 md:px-10 w-full  mx-auto my-5">
      <slot></slot>
    </div>

    <!-- footer -->
   <footer
            class="bg-gradient-to-t from-slate-900 to-slate-800 border-t border-slate-700"
        >
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12"
                >
                    <!-- Brand -->
                    <div class="col-span-1 lg:col-span-2">
                        <h3 class="text-2xl font-bold text-white mb-4">
                            Delight Interior 
                        </h3>
                        <p class="text-gray-400 text-lg mb-6 max-w-md">
                           Delight Interior description goes here
                        </p>
                        <div class="flex space-x-4">
                            <a
                                href="#"
                                class="text-gray-400 hover:text-orange-500 transition-colors duration-300 hover:shadow-[0_0_15px_rgba(249,115,22,0.3)]"
                            >
                                <svg
                                    class="h-6 w-6"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="#"
                                class="text-gray-400 hover:text-orange-500 transition-colors duration-300 hover:shadow-[0_0_15px_rgba(249,115,22,0.3)]"
                            >
                                <svg
                                    class="h-6 w-6"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="#"
                                class="text-gray-400 hover:text-orange-500 transition-colors duration-300 hover:shadow-[0_0_15px_rgba(249,115,22,0.3)]"
                            >
                                <svg
                                    class="h-6 w-6"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.042-3.441.219-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.888-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.357-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="#"
                                class="text-gray-400 hover:text-orange-500 transition-colors duration-300 hover:shadow-[0_0_15px_rgba(249,115,22,0.3)]"
                            >
                                <svg
                                    class="h-6 w-6"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0C5.374 0 0 5.373 0 12s5.374 12 12 12 12-5.373 12-12S18.626 0 12 0zm5.568 8.16c-.180 1.896-.960 6.728-.960 6.728-.405 3.137-1.502 3.684-2.935 3.684-1.287 0-2.024-.84-2.024-2.04 0-.78.156-1.44.624-2.04.468-.6 1.188-.84 1.836-.84.42 0 .78.12 1.044.36.264.24.42.6.42 1.08 0 .48-.156.9-.468 1.2-.312.3-.744.48-1.248.48-.36 0-.66-.12-.9-.36-.24-.24-.36-.6-.36-1.08 0-.36.096-.66.288-.9.192-.24.456-.36.792-.36.24 0 .444.072.612.216.168.144.252.36.252.648 0 .216-.06.396-.18.54-.12.144-.288.216-.504.216-.144 0-.264-.048-.36-.144-.096-.096-.144-.24-.144-.432 0-.144.036-.252.108-.324.072-.072.18-.108.324-.108.096 0 .168.024.216.072.048.048.072.12.072.216 0 .072-.018.126-.054.162-.036.036-.09.054-.162.054-.054 0-.096-.012-.126-.036-.03-.024-.045-.06-.045-.108 0-.036.009-.063.027-.081.018-.018.045-.027.081-.027.024 0 .042.006.054.018.012.012.018.03.018.054 0 .018-.003.03-.009.036-.006.006-.018.009-.036.009-.012 0-.021-.003-.027-.009-.006-.006-.009-.018-.009-.036z"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-white font-semibold mb-4">
                            Quick Links
                        </h4>
                        <ul class="space-y-2">
                            <li>
                                <Link
                                    href="/"
                                    class="text-gray-400 hover:text-orange-500 transition-colors duration-300"
                                    >Home</Link
                                >
                            </li>
                            <li>
                                <Link
                                    href="/about"
                                    class="text-gray-400 hover:text-orange-500 transition-colors duration-300"
                                    >About</Link
                                >
                            </li>
                            <!-- <li>
                                <a
                                    href="#"
                                    class="text-gray-400 hover:text-orange-500 transition-colors duration-300"
                                    >Submissions</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="text-gray-400 hover:text-orange-500 transition-colors duration-300"
                                    >Privacy Policy</a
                                >
                            </li> -->
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div>
                        <h4 class="text-white font-semibold mb-4">
                            Stay Updated
                        </h4>
                        <p class="text-gray-400 text-sm mb-4">
                            Get the latest film festival news and updates.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-2">
                            <input
                                type="email"
                                placeholder="Your email"
                                class="flex-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all duration-300"
                            />
                            <button
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg transition-all duration-300 hover:shadow-[0_0_25px_rgba(249,115,22,0.4)]"
                            >
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Bottom Bar -->
                <div class="border-t border-gray-700 pt-8">
                    <div
                        class="flex flex-col md:flex-row justify-between items-center"
                    >
                        <p class="w-full text-gray-400 text-center text-sm">
                            © {{ new Date().getFullYear() }} Delight Interior. All rights reserved.
                        </p>
                        <!-- <div class="flex space-x-6 mt-4 md:mt-0">
                            <a
                                href="#"
                                class="text-gray-400 hover:text-orange-500 text-sm transition-colors duration-300"
                                >Terms of Service</a
                            >
                            <a
                                href="#"
                                class="text-gray-400 hover:text-orange-500 text-sm transition-colors duration-300"
                                >Privacy Policy</a
                            >
                            <a
                                href="#"
                                class="text-gray-400 hover:text-orange-500 text-sm transition-colors duration-300"
                                >Cookie Policy</a
                            >
                        </div> -->
                    </div>
                </div>
            </div>
        </footer>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import { X } from "lucide-vue-next";

// state for mobile menu
const isMobileMenuOpen = ref(false);

// toggle menu function
function toggleMenu() {
  isMobileMenuOpen.value = !isMobileMenuOpen.value;
}
</script>

<style>
.slide-enter-active,
.slide-leave-active {
  transition: transform 0.3s ease, opacity 0.3s ease;
}
.slide-enter-from {
  transform: translateX(-100%);
  opacity: 0;
}
.slide-enter-to {
  transform: translateX(0);
  opacity: 1;
}
.slide-leave-from {
  transform: translateX(0);
  opacity: 1;
}
.slide-leave-to {
  transform: translateX(-100%);
  opacity: 0;
}
</style>
