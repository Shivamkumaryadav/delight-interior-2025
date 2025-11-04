<template>
    <section class="">
        <div class="w-full mx-auto text-center bg-white">
            <div >
                <img class=""src=""/>
            </div>
            <h1
                class="text-4xl md:text-6xl font-extrabold text-gray-900 dark:text-white leading-tight tracking-tighter"
            >
                Our Films Solutions
            </h1>
            <p
                class="mt-6 text-lg md:text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto"
            >
                Our journey began with a simple vision: to enhance comfort and
                energy efficiency in homes and businesses through innovative sun
                control solutions. Today, we're a leading provider of
                high-quality window films, committed to excellence and
                sustainability.
            </p>
        </div>
        <div class="gap-1 flex flex-1 justify-center py-5">
            <!-- end filters for mobile devices or tablets -->

            <!-- films section -->
            <div class="layout-content-container flex flex-col flex-1">
                <div class="flex flex-wrap justify-between gap-3">
                    <div class="flex min-w-72 flex-col gap-3">
                        <p
                            class="text-[#0e141b] tracking-light text-[32px] font-bold leading-tight"
                        >
                            Our Films
                        </p>
                        <p
                            class="text-[#4e7397] text-sm md:text-md mb-6 font-normal leading-normal"
                        >
                            Explore our range of sun control films designed to
                            enhance comfort, protect interiors, and reduce
                            energy costs.
                        </p>
                    </div>
                </div>
                <!-- filter buttons for mobile section -->
                <div class="sm:flex justify-between gap-5 items-center">
                    <div class="flex flex-1">
                        <div class="w-full flex items-center relative">
                            <div
                                class="w-full rounded-md border-gray-300"
                            >
                                <!-- SearchBox -->
                                <div class="relative">
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5"
                                        >
                                            <svg
                                                class="shrink-0 size-4 text-gray-400 dark:text-white/60"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <circle
                                                    cx="11"
                                                    cy="11"
                                                    r="8"
                                                ></circle>
                                                <path d="m21 21-4.3-4.3"></path>
                                            </svg>
                                        </div>
                                        <input
                                            class="py-2.5 py-3 border border-gray-300 sm:w-80 w-full ps-10 pe-4 block w-ful border-gray-200 rounded-lg sm:text-sm focus:border-red-500 focus:ring-red-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                            type="text"
                                            role="combobox"
                                            aria-expanded="false"
                                            placeholder="Search by film name"
                                            value=""
                                        />
                                    </div>

                                    <!-- SearchBox Dropdown -->
                                    <div
                                        class="absolute z-50 bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700"
                                        style="display: none"
                                        data-hs-combo-box-output=""
                                    >
                                        <div
                                            class="max-h-72 rounded-b-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
                                            data-hs-combo-box-output-items-wrapper=""
                                        ></div>
                                    </div>
                                    <!-- End SearchBox Dropdown -->
                                </div>
                                <!-- End SearchBox -->
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between my-5">
                        <div class="min-w-52 w-auto">
                            <SelectInput
                                class="flex-1"
                                v-model="filmType"
                                :options="categories"
                                option-label="name"
                                option-value="id"
                                label=""
                                name="name"
                                id="film"
                                placeholder=""
                            />
                        </div>
                        <!-- <div
                        class="flex gap-2 rounded-md bg-gray px-3 py-2 cursor-pointer"
                    >
                        <span><Funnel /></span>
                        Filter
                    </div> -->
                    </div>
                </div>
                <!-- <div class="flex gap-3 p-3 flex-wrap pr-4">
                        <div
                            class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#e7edf3] pl-4 pr-4"
                        >
                            <p
                                class="text-[#0e141b] text-sm font-medium leading-normal"
                            >
                                Residential
                            </p>
                        </div>
                        <div
                            class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#e7edf3] pl-4 pr-4"
                        >
                            <p
                                class="text-[#0e141b] text-sm font-medium leading-normal"
                            >
                                UV Protection
                            </p>
                        </div>
                        <div
                            class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#e7edf3] pl-4 pr-4"
                        >
                            <p
                                class="text-[#0e141b] text-sm font-medium leading-normal"
                            >
                                Price: $0 - $1000
                            </p>
                        </div>
                    </div> -->
                <div
                    class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5"
                >
                    <FilmCard v-for="film in films" :film="film" />
                </div>
            </div>
        </div>
    </section>
</template>
<script setup lang="ts">
import SelectInput from "@/components/SelectInput.vue";
import FilmCard from "@/components/FilmCard.vue";
import Input from "@/components/ui/input/Input.vue";
import AppLayout from "@/Pages/Layouts/AppLayout.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { Funnel, Search } from "lucide-vue-next";
import { ref } from "vue";

const page = usePage();
const categories = page.props.categories;
const films = page.props.films;

// film change filter
const filmType = ref("all");
</script>
