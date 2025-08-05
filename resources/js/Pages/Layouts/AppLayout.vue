<template>
    <div class="flex flex-col h-screen ">
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
                    <div class="hidden md:flex items-center justify-start gap-6">
                        <div class=" ">
                            <a href="" class="">Home</a>
                            <div
                                class="w-auto bg-red-600 h-[5px] rounded-tl-2xl rounded-br-2xl"
                            ></div>
                        </div>
                        <div class=" ">
                            <Link href="/films">
                                <div class="text-[#B22A42]">Films</div>
                                <div
                                    class="bg-red-600 h-[5px] rounded-tl-xl rounded-br-xl"
                                ></div>
                            </Link>
                        </div>

                    </div>
                    <div class="md:hidden">
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
                    </div>
                </div>
            </div>
        </div>
        <!-- main content -->
        <div class="flex-1 px-4  w-full lg:max-w-[80vw] mx-auto my-5">
            <slot></slot>
        </div>

        <!-- footer -->
        <Footer class="border-t py-5 text-center"> 2025 </Footer>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';


</script>
