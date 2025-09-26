<template>
    <section>
        <h3 class="text-md font-semibold md:text-xl">Our Film Solutions</h3>

        <div class="gap-1 flex flex-1 justify-center py-5">
            <!-- filter films for desktop -->
            <div class="hidden lg:flex flex-col w-80">
                <h2
                    class="text-[#0e141b] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5"
                >
                    Filters
                </h2>
                <div class="px-4">
                    <label class="flex gap-x-3 py-3 flex-row">
                        <input
                            type="checkbox"
                            class="h-5 w-5 rounded border-[#d0dbe7] border-2 bg-transparent text-[#1773cf] checked:bg-[#1773cf] checked:border-[#1773cf] checked:bg-[image:--checkbox-tick-svg] focus:ring-0 focus:ring-offset-0 focus:border-[#d0dbe7] focus:outline-none"
                        />
                        <p
                            class="text-[#0e141b] text-base font-normal leading-normal"
                        >
                            Residential
                        </p>
                    </label>
                    <label class="flex gap-x-3 py-3 flex-row">
                        <input
                            type="checkbox"
                            class="h-5 w-5 rounded border-[#d0dbe7] border-2 bg-transparent text-[#1773cf] checked:bg-[#1773cf] checked:border-[#1773cf] checked:bg-[image:--checkbox-tick-svg] focus:ring-0 focus:ring-offset-0 focus:border-[#d0dbe7] focus:outline-none"
                        />
                        <p
                            class="text-[#0e141b] text-base font-normal leading-normal"
                        >
                            Commercial
                        </p>
                    </label>
                    <label class="flex gap-x-3 py-3 flex-row">
                        <input
                            type="checkbox"
                            class="h-5 w-5 rounded border-[#d0dbe7] border-2 bg-transparent text-[#1773cf] checked:bg-[#1773cf] checked:border-[#1773cf] checked:bg-[image:--checkbox-tick-svg] focus:ring-0 focus:ring-offset-0 focus:border-[#d0dbe7] focus:outline-none"
                        />
                        <p
                            class="text-[#0e141b] text-base font-normal leading-normal"
                        >
                            Automotive
                        </p>
                    </label>
                </div>
                <h2
                    class="text-[#0e141b] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5"
                >
                    Features
                </h2>
                <div class="px-4">
                    <label class="flex gap-x-3 py-3 flex-row">
                        <input
                            type="checkbox"
                            class="h-5 w-5 rounded border-[#d0dbe7] border-2 bg-transparent text-[#1773cf] checked:bg-[#1773cf] checked:border-[#1773cf] checked:bg-[image:--checkbox-tick-svg] focus:ring-0 focus:ring-offset-0 focus:border-[#d0dbe7] focus:outline-none"
                        />
                        <p
                            class="text-[#0e141b] text-base font-normal leading-normal"
                        >
                            UV Protection
                        </p>
                    </label>
                    <label class="flex gap-x-3 py-3 flex-row">
                        <input
                            type="checkbox"
                            class="h-5 w-5 rounded border-[#d0dbe7] border-2 bg-transparent text-[#1773cf] checked:bg-[#1773cf] checked:border-[#1773cf] checked:bg-[image:--checkbox-tick-svg] focus:ring-0 focus:ring-offset-0 focus:border-[#d0dbe7] focus:outline-none"
                        />
                        <p
                            class="text-[#0e141b] text-base font-normal leading-normal"
                        >
                            Heat Rejection
                        </p>
                    </label>
                    <label class="flex gap-x-3 py-3 flex-row">
                        <input
                            type="checkbox"
                            class="h-5 w-5 rounded border-[#d0dbe7] border-2 bg-transparent text-[#1773cf] checked:bg-[#1773cf] checked:border-[#1773cf] checked:bg-[image:--checkbox-tick-svg] focus:ring-0 focus:ring-offset-0 focus:border-[#d0dbe7] focus:outline-none"
                        />
                        <p
                            class="text-[#0e141b] text-base font-normal leading-normal"
                        >
                            Privacy Level
                        </p>
                    </label>
                    <label class="flex gap-x-3 py-3 flex-row">
                        <input
                            type="checkbox"
                            class="h-5 w-5 rounded border-[#d0dbe7] border-2 bg-transparent text-[#1773cf] checked:bg-[#1773cf] checked:border-[#1773cf] checked:bg-[image:--checkbox-tick-svg] focus:ring-0 focus:ring-offset-0 focus:border-[#d0dbe7] focus:outline-none"
                        />
                        <p
                            class="text-[#0e141b] text-base font-normal leading-normal"
                        >
                            Glare Reduction
                        </p>
                    </label>
                    <label class="flex gap-x-3 py-3 flex-row">
                        <input
                            type="checkbox"
                            class="h-5 w-5 rounded border-[#d0dbe7] border-2 bg-transparent text-[#1773cf] checked:bg-[#1773cf] checked:border-[#1773cf] checked:bg-[image:--checkbox-tick-svg] focus:ring-0 focus:ring-offset-0 focus:border-[#d0dbe7] focus:outline-none"
                        />
                        <p
                            class="text-[#0e141b] text-base font-normal leading-normal"
                        >
                            Warranty
                        </p>
                    </label>
                </div>
                <h2
                    class="text-[#0e141b] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5"
                >
                    Price Range
                </h2>
                <div class="@container">
                    <div
                        class="relative flex w-full flex-col items-start justify-between gap-3 p-4 @[480px]:flex-row"
                    >
                        <p
                            class="text-[#0e141b] text-base font-medium leading-normal w-full shrink-[3]"
                        >
                            Price Range
                        </p>
                        <div class="flex h-[38px] w-full pt-1.5">
                            <div
                                class="flex h-1 w-full rounded-sm bg-[#d0dbe7] pl-[60%] pr-[15%]"
                            >
                                <div class="relative">
                                    <div
                                        class="absolute -left-3 -top-1.5 flex flex-col items-center gap-1"
                                    >
                                        <div
                                            class="size-4 rounded-full bg-[#1773cf]"
                                        ></div>
                                        <p
                                            class="text-[#0e141b] text-sm font-normal leading-normal"
                                        >
                                            $0
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="h-1 flex-1 rounded-sm bg-[#1773cf]"
                                ></div>
                                <div class="relative">
                                    <div
                                        class="absolute -left-3 -top-1.5 flex flex-col items-center gap-1"
                                    >
                                        <div
                                            class="size-4 rounded-full bg-[#1773cf]"
                                        ></div>
                                        <p
                                            class="text-[#0e141b] text-sm font-normal leading-normal"
                                        >
                                            $1000
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex px-4 py-3">
                    <button
                        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 flex-1 bg-[#1773cf] text-slate-50 text-sm font-bold leading-normal tracking-[0.015em]"
                    >
                        <span class="truncate">Apply Filters</span>
                    </button>
                </div>
            </div>

            <!-- filters for mobile devices or tablets (bottom to top) -->

            <div
                class="fixed md:hidden inset-0 flex items-end w-full h-screen bg-gray-100/50"
            >
                <div class="bg-white w-full h-[70vh] p-6">
                    <h3>Filters</h3>

                    <div class="my-5">
                        <h3>Film Type</h3>
                        <div class="space-y-3 mt-3">
                            <div class="flex gap-3 items-center">
                                <input type="checkbox" class="" />
                                <span>Ceramic</span>
                            </div>
                            <div class="flex gap-3 items-center">
                                <input type="checkbox" class="" />
                                <span>Ceramic</span>
                            </div>
                            <div class="flex gap-3 items-center">
                                <input type="checkbox" class="" />
                                <span>Ceramic</span>
                            </div>
                        </div>
                    </div>
                    <div class="my-5">
                        <h3>Film Features</h3>
                        <div class="space-y-3 mt-3">
                            <div class="flex gap-3 items-center">
                                <input type="checkbox" class="" />
                                <span>Ceramic</span>
                            </div>
                            <div class="flex gap-3 items-center">
                                <input type="checkbox" class="" />
                                <span>Ceramic</span>
                            </div>
                            <div class="flex gap-3 items-center">
                                <input type="checkbox" class="" />
                                <span>Ceramic</span>
                            </div>
                        </div>
                    </div>
                    <div class="my-5">
                        <h3>Price</h3>
                        <div class="space-y-3 mt-3">
                            <div class="flex gap-3 items-center">
                                <input
                                    type="text"
                                    class="w-16 rounded-lg p-1 border"
                                    placeholder="min"
                                />
                                <span>to</span>
                                <input
                                    type="text"
                                    class="w-16 rounded-lg p-1 border"
                                    placeholder="max"
                                />
                                <button>Apply</button>
                            </div>
                            <div class="flex gap-3 items-center">
                                <input type="checkbox" class="" />
                                <span>100 to 200</span>
                            </div>
                            <div class="flex gap-3 items-center">
                                <input type="checkbox" class="" />
                                <span>200 to 300</span>
                            </div>
                            <div class="flex gap-3 items-center">
                                <input type="checkbox" class="" />
                                <span>300 to 500</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

                <div class="flex justify-between my-5">
                    <div class="min-w-52 w-auto">
                        <SelectInput
                            class="flex-1"
                            v-model="filmType"
                            :options="films"
                            option-label="name"
                            option-value="id"
                            label=""
                            name="name"
                            id="film"
                            placeholder=""
                        />
                    </div>
                    <div
                        class="flex gap-2 rounded-md bg-gray px-3 py-2 cursor-pointer"
                    >
                        <span><Funnel /></span>
                        Filter
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
                    class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-3"
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
import { Funnel } from "lucide-vue-next";
import { ref } from "vue";

const page = usePage();
const films = page.props.films;

// film change filter
const filmType = ref("all");
</script>
