<script setup lang="ts">
import AdminLayout from "../Layouts/AdminLayout.vue";
</script>

<template>
    <AdminLayout>
            <div class="flex flex-wrap justify-between gap-3 p-4">
                            <p
                                class="text-[#1c120d] tracking-light text-[32px] font-bold leading-tight min-w-72"
                            >
                                Dashboards
                            </p>
                        </div>
                        <div class="flex flex-wrap gap-4 p-4">
                            <div
                                class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-lg p-6 bg-[#f4ebe7]"
                            >
                                <p
                                    class="text-[#1c120d] text-base font-medium leading-normal"
                                >
                                    Total Films
                                </p>
                                <p
                                    class="text-[#1c120d] tracking-light text-2xl font-bold leading-tight"
                                >
                                    120
                                </p>
                            </div>
                            <div
                                class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-lg p-6 bg-[#f4ebe7]"
                            >
                                <p
                                    class="text-[#1c120d] text-base font-medium leading-normal"
                                >
                                    Categories
                                </p>
                                <p
                                    class="text-[#1c120d] tracking-light text-2xl font-bold leading-tight"
                                >
                                    15
                                </p>
                            </div>
                            <div
                                class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-lg p-6 bg-[#f4ebe7]"
                            >
                                <p
                                    class="text-[#1c120d] text-base font-medium leading-normal"
                                >
                                    Services
                                </p>
                                <p
                                    class="text-[#1c120d] tracking-light text-2xl font-bold leading-tight"
                                >
                                    8
                                </p>
                            </div>
                            <div
                                class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-lg p-6 bg-[#f4ebe7]"
                            >
                                <p
                                    class="text-[#1c120d] text-base font-medium leading-normal"
                                >
                                    Users
                                </p>
                                <p
                                    class="text-[#1c120d] tracking-light text-2xl font-bold leading-tight"
                                >
                                    500
                                </p>
                            </div>
                            <div
                                class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-lg p-6 bg-[#f4ebe7]"
                            >
                                <p
                                    class="text-[#1c120d] text-base font-medium leading-normal"
                                >
                                    Enquiries
                                </p>
                                <p
                                    class="text-[#1c120d] tracking-light text-2xl font-bold leading-tight"
                                >
                                    250
                                </p>
                            </div>
                        </div>

                        <h2
                            class="text-[#1c120d] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5"
                        >
                            Recent Enquiries
                        </h2>
                        <div class="px-4 py-3">
                            <div
                                class="flex overflow-hidden rounded-lg border border-[#e8d7ce] bg-[#fcf9f8]"
                            >
                                <table class="flex-1 overflow-x-auto">
                                    <thead>
                                        <tr class="bg-[#fcf9f8]">
                                            <th
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-120 px-4 py-3 text-left text-[#1c120d] w-[400px] text-sm font-medium leading-normal"
                                            >
                                                Name
                                            </th>
                                            <th
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-240 px-4 py-3 text-left text-[#1c120d] w-[400px] text-sm font-medium leading-normal"
                                            >
                                                Email
                                            </th>
                                            <th
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-360 px-4 py-3 text-left text-[#1c120d] w-[400px] text-sm font-medium leading-normal"
                                            >
                                                Phone
                                            </th>
                                            <th
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-480 px-4 py-3 text-left text-[#1c120d] w-[400px] text-sm font-medium leading-normal"
                                            >
                                                Service
                                            </th>
                                            <th
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-600 px-4 py-3 text-left text-[#1c120d] w-[400px] text-sm font-medium leading-normal"
                                            >
                                                Date
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-t border-t-[#e8d7ce]">
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-120 h-[72px] px-4 py-2 w-[400px] text-[#1c120d] text-sm font-normal leading-normal"
                                            >
                                                Ethan Harper
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                ethan.harper@example.com
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                555-123-4567
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                Residential
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-600 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                2024-07-26
                                            </td>
                                        </tr>
                                        <tr class="border-t border-t-[#e8d7ce]">
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-120 h-[72px] px-4 py-2 w-[400px] text-[#1c120d] text-sm font-normal leading-normal"
                                            >
                                                Olivia Bennett
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                olivia.bennett@example.com
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                555-987-6543
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                Commercial
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-600 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                2024-07-25
                                            </td>
                                        </tr>
                                        <tr class="border-t border-t-[#e8d7ce]">
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-120 h-[72px] px-4 py-2 w-[400px] text-[#1c120d] text-sm font-normal leading-normal"
                                            >
                                                Noah Carter
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                noah.carter@example.com
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                555-246-8013
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                Automotive
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-600 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                2024-07-24
                                            </td>
                                        </tr>
                                        <tr class="border-t border-t-[#e8d7ce]">
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-120 h-[72px] px-4 py-2 w-[400px] text-[#1c120d] text-sm font-normal leading-normal"
                                            >
                                                Ava Davis
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                ava.davis@example.com
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                555-369-1470
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                Residential
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-600 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                2024-07-23
                                            </td>
                                        </tr>
                                        <tr class="border-t border-t-[#e8d7ce]">
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-120 h-[72px] px-4 py-2 w-[400px] text-[#1c120d] text-sm font-normal leading-normal"
                                            >
                                                Liam Evans
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                liam.evans@example.com
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                555-789-0123
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                Commercial
                                            </td>
                                            <td
                                                class="table-d5003a99-09ed-4708-a837-cdf97ce7f8c7-column-600 h-[72px] px-4 py-2 w-[400px] text-[#9c6549] text-sm font-normal leading-normal"
                                            >
                                                2024-07-22
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
          
         
    </AdminLayout>
</template>
