<template>
    <AppLayout>
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
                                Explore our range of sun control films designed
                                to enhance comfort, protect interiors, and
                                reduce energy costs.
                            </p>
                        </div>
                    </div>
                    <!-- filter buttons for mobile section -->
                    <div class="flex justify-between my-5">
                        <div class="relative">
                            <div
                                class="rounded-md px-6 cursor-pointer outline-none ring-0 py-2 bg-gray"
                                name=""
                                id=""
                            >
                                All
                            </div>
                            <!-- dropdown for all films -->
                            <div
                                class="hidden overflow-y-auto h-52 top-12 w-48 rounded absolute bg-gray"
                            >
                                <div class="flex flex-col gap-1">
                                    <Link
                                        class="w-full px-3 py-1 hover:bg-orange-500 hover:text-white"
                                        href=""
                                        >Sun Films</Link
                                    >
                                    <Link
                                        class="w-full px-3 py-1 hover:bg-orange-500 hover:text-white"
                                        href=""
                                        >Sun Films</Link
                                    >
                                    <Link
                                        class="w-full px-3 py-1 hover:bg-orange-500 hover:text-white"
                                        href=""
                                        >Sun Films</Link
                                    >

                                </div>
                            </div>
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
                        class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3"
                    >
                        <div class="flex flex-col gap-3 pb-3">
                            <div
                                class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                style="
                                    background-image: url(&quot;https://lh3.googleusercontent.com/aida-public/AB6AXuAo8F6JYAq7BFlZvL_9Lw_qblpbtGmgNf9OdGcdyM91HOdo6sWhtxRbpoRSIJiqS75G5yfw0gh9kcJUmcotUmrwTsyUVQHzAZ7Sk6-H4sqI7b9GK9C-oHPYmR76_BLF-1cLAKy9ZRWmRxCsawVm2dbelrQiez72aPwzVUT_NCoa9koL2iewT99xKGdF5lbBJKnyh1Yv3y9O8Y5HN3K9em_mgeQ4h-xhfZe_kUANQ0nZFhGdOxfvSQp3MOah8y3H1St6DHidgVHsP_Y&quot;);
                                "
                            ></div>
                            <div>
                                <p
                                    class="text-[#0e141b] text-base font-medium leading-normal"
                                >
                                    Residential Film 1
                                </p>
                                <p
                                    class="text-[#4e7397] text-sm font-normal leading-normal"
                                >
                                    High performance film for homes
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 pb-3">
                            <div
                                class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                style="
                                    background-image: url(&quot;https://lh3.googleusercontent.com/aida-public/AB6AXuB1KZiKuifSDTB2VTRAu6siuv_Xorl-lQ-RMlQZiB3a8j2b23ccAX8MWUz1Ye0EX0BlECTekW918FugcXGwsuSVm0xua-hyg4t8NZTu9kgzY11SYmUUy3BGR2COVecl8HCFon5l1WBZopwVh39MVAk-mnY-JRaRAHIk6g7Ly0kqr5jm8vUATvYUsNkHBtnHhzFUj60XExXUVMnVrZRvMrG1UTIQVtrAXquDoPqDyTLp1he4YhkNFvru1kG1veBvMvL45hVjl26KR-k&quot;);
                                "
                            ></div>
                            <div>
                                <p
                                    class="text-[#0e141b] text-base font-medium leading-normal"
                                >
                                    Commercial Film 2
                                </p>
                                <p
                                    class="text-[#4e7397] text-sm font-normal leading-normal"
                                >
                                    Durable film for office buildings
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 pb-3">
                            <div
                                class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                style="
                                    background-image: url(&quot;https://lh3.googleusercontent.com/aida-public/AB6AXuATWX_Q_Dgl0FWK_s1U6fKEc28wwgzhHSkEKvRZMVLhbzKEUe5zYogYa-YH8YCgDBg4k_eLGJEbB55kOrfmhwDVelA9ViNNPoP2cz_0cb48VPbA4kMPybcI6e5ZSdDa-J0I3UBmiAvdY9_cUMc6LAvn5aWcYy3peJBTNJk1TfHp9uBiKN3Oh-quteK5Kvl6IuT3--qDM470T1H8nVy0bRDyfmQAWPOA0O8NydIoBjTELFxt8TRL1Hc29e6E7X4ApOPm2IaTVe35mOk&quot;);
                                "
                            ></div>
                            <div>
                                <p
                                    class="text-[#0e141b] text-base font-medium leading-normal"
                                >
                                    Automotive Film 3
                                </p>
                                <p
                                    class="text-[#4e7397] text-sm font-normal leading-normal"
                                >
                                    Tinted film for cars
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 pb-3">
                            <div
                                class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                style="
                                    background-image: url(&quot;https://lh3.googleusercontent.com/aida-public/AB6AXuDxPGvFXPD-C05bQR4P-nKuoxnsm7ha76HpCNF5B7Cmc169FHbQ-08vrVXChdNXjayxNYVP46ciIGhP4NJe2QmHpNAumTZVJ3arZL8nI2LFB252W9ole7uFMQn0I3wgyZq7wJvs5_E9MbPSiG2AGoD3vZ0g_nt3axZPA-8ZA40VHwKEFueh9yEJIhotklq6QHuPZFvS50b3e4f72coQvIh0SijctjmX6RzR5VzNveov5_-UEEYepai0kDUC--IhGbAIhR9B1VnNlxo&quot;);
                                "
                            ></div>
                            <div>
                                <p
                                    class="text-[#0e141b] text-base font-medium leading-normal"
                                >
                                    Residential Film 4
                                </p>
                                <p
                                    class="text-[#4e7397] text-sm font-normal leading-normal"
                                >
                                    Energy-efficient film for homes
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 pb-3">
                            <div
                                class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                style="
                                    background-image: url(&quot;https://lh3.googleusercontent.com/aida-public/AB6AXuDHwE109RIWuQApwrkanKkyIgLabH_eIFRu5grRzIFCvT9DaBbuy-YX-yxK5MI_-DKVS0yKANX2GCdMwexK7KmbwAfLQyZnoD7LxOTCp9P843m2GD7G_uT436p-MhiSAGTuhE_QF6tCUJKVknIB0Kw50gaokYFwYXTACScP0f32TvoJNXCM_r_qpV6MqBpZ6aNsimQvZvbuU8bO_8Lwc5875kugpabU7ghaGhESQ3h_okJAmAC3Dv_LgdgsqWOQgGWACYntZbbTFWs&quot;);
                                "
                            ></div>
                            <div>
                                <p
                                    class="text-[#0e141b] text-base font-medium leading-normal"
                                >
                                    Commercial Film 5
                                </p>
                                <p
                                    class="text-[#4e7397] text-sm font-normal leading-normal"
                                >
                                    Security film for businesses
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 pb-3">
                            <div
                                class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                style="
                                    background-image: url(&quot;https://lh3.googleusercontent.com/aida-public/AB6AXuBVDvmXtrsXvZJp75GQ1YU24ogYFLNFB1gyz6q1rxLmyNUVLf1hnlxs4P8OHj55Lz-hRcgX3YIqKZbCoM0HVzvHPr_0ABqM91KMuGjPDB2vft67KPNOxMfyQ5NjjW_BEWVqhaIGG0jXkBco72ONGyXQlWVfEEnK-52YMaru_jM3gTnp6be41hn-voBG3LGn3ac00U-kAzZkCzZ_UmYto7OQbA-bRyS8_0IHroJrF-bOsBMTk_BMZ4lSwf5S5n5XrOwo7Y4sUuR_DPs&quot;);
                                "
                            ></div>
                            <div>
                                <p
                                    class="text-[#0e141b] text-base font-medium leading-normal"
                                >
                                    Automotive Film 6
                                </p>
                                <p
                                    class="text-[#4e7397] text-sm font-normal leading-normal"
                                >
                                    UV protection film for vehicles
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
<script setup lang="ts">
import AppLayout from "@/Pages/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import { Funnel } from "lucide-vue-next";
</script>
