<script setup>
import Summernote from "@/components/admin/Summernote.vue";
import Button from "@/components/Button.vue";
import ErrorMessage from "@/components/ErrorMessage.vue";
import NavigationLink from "@/components/NavigationLink.vue";
import SelectInput from "@/components/SelectInput.vue";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import AdminLayout from "@/Pages/Layouts/AdminLayout.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";

const page = usePage();
const film = computed(() => page.props.film);
const items = computed(() => page.props.calculations);
const totals = computed(() => page.props.totals);

const totalPrice = ref(0);
const gstAmount = ref(0);
const sgstAmount = ref(0);
const grandTotal = ref(0);

const form = useForm({
    offer_valid_date: "",
    email: "",
    film_calculations: {
        totalPrice: null,
        gstAmount: null,
        sgstAmount: null,
        grandTotal: null,
    },
});
const billToContent = ref("<p>Type client details here...</p>");
// function to send email (i will do this later after learning the pdf view format)
function store() {
    form.post("/admin/calculator");
}

// watch(
//     () => [form.length, form.price, form.gst, form.sgst],
//     () => {
//         const length = parseFloat(form.length) || 0;
//         const price = parseFloat(form.price) || 0;
//         const gst = parseFloat(form.gst) || 0;
//         const sgst = parseFloat(form.sgst) || 0;

//         totalPrice.value = length * price;
//         gstAmount.value = (totalPrice.value * gst) / 100;
//         sgstAmount.value = (totalPrice.value * sgst) / 100;
//         grandTotal.value =
//             totalPrice.value + gstAmount.value + sgstAmount.value;
//     },
//     { immediate: true },
// );
</script>

<template>
    <div class="flex flex-col w-full">
        <!-- allow full width but center -->

        <!-- Header -->
        <div class="flex flex-wrap justify-between gap-3 p-4">
            <p
                class="text-[#111418] tracking-light text-[32px] font-bold leading-tight min-w-72"
            >
                New Invoice
            </p>
        </div>

        <!-- Client Details -->
        <h3
            class="text-[#111418] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4"
        >
            Client Details
        </h3>
        <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
            <label class="flex flex-col min-w-40 flex-1">
                <p
                    class="text-[#111418] text-base font-medium leading-normal pb-2"
                >
                    Bill To
                </p>
                <Summernote v-model="billToContent" />
            </label>
        </div>

        <!-- Invoice Items -->
        <h3
            class="text-[#111418] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4"
        >
            Invoice Items
        </h3>

        <div class="overflow-x-auto">
            <table
                class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700"
            >
                <thead class="bg-gray-50">
                    <tr>
                        <th
                            scope="col"
                            class="px-6 whitespace-nowrap py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500"
                        >
                            Item
                        </th>
                        <th
                            scope="col"
                            class="px-6 whitespace-nowrap py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500"
                        >
                            Length (in sqft)
                        </th>
                        <th
                            scope="col"
                            class="px-6 whitespace-nowrap py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500"
                        >
                            Price
                        </th>
                        <th
                            scope="col"
                            class="px-6 whitespace-nowrap py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500"
                        >
                            CGST (in %)
                        </th>
                        <th
                            scope="col"
                            class="px-6 whitespace-nowrap py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500"
                        >
                            SGST (in %)
                        </th>
                        <th
                            scope="col"
                            class="px-6 whitespace-nowrap py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500"
                        >
                            Sub Total (without GST & SGST)
                        </th>
                    </tr>
                </thead>
                <tbody
                    v-if="items.length"
                    class="divide-y divide-gray-200 dark:divide-neutral-700"
                >
                    <tr v-for="(item, index) in items" :key="index">
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"
                        >
                            {{ item.film_name }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"
                        >
                            {{ item.length }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"
                        >
                            {{ item.price }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"
                        >
                            {{ item.gst }} %
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"
                        >
                            {{ item.sgst }} %
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"
                        >
                            {{ item.totalPrice }}
                        </td>
                    </tr>
                    <tr>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"
                        ></td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"
                        ></td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"
                        ></td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800 dark:text-neutral-200"
                        >
                            Total CGST
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800 dark:text-neutral-200"
                        >
                            Total SGST
                        </td>
                        <td
                            class="px-6 font-semibold text-md py-4 whitespace-nowrap text-gray-800 dark:text-neutral-200"
                        >
                            Sub Total (Without cgst and sgst)
                        </td>
                    </tr>
                    <tr>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"
                        ></td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"
                        ></td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"
                        ></td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-lg font-bold text-gray-800 dark:text-neutral-200"
                        >
                            {{ totals.total_gst }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-lg font-bold text-gray-800 dark:text-neutral-200"
                        >
                            {{ totals.total_sgst }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-lg font-bold text-gray-800 dark:text-neutral-200"
                        >
                            {{ totals.subtotal }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Other Sections (Payment Terms, Bank Details, etc.) -->
        <h3
            class="text-[#111418] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4"
        >
            Payment Terms
        </h3>
        <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
            <label class="flex flex-col min-w-40 flex-1">
                <p
                    class="text-[#111418] text-base font-medium leading-normal pb-2"
                >
                    Payment Due Date
                </p>
                <input
                    type="date"
                    placeholder="Select due date"
                    class="w-full h-14 px-4 py-2 text-base text-[#111418] placeholder:text-[#617589] border border-[#dbe0e6] rounded-xl focus:outline-none focus:ring-0 focus:border-[#dbe0e6]"
                />
            </label>
        </div>

        <h3
            class="text-[#111418] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4"
        >
            Bank Details
        </h3>
        <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
            <label class="flex flex-col min-w-40 flex-1">
                <p
                    class="text-[#111418] text-base font-medium leading-normal pb-2"
                >
                    Bank Name
                </p>
                <div class="flex w-full flex-1 items-stretch rounded-xl">
                    <input
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border border-[#dbe0e6] bg-white focus:border-[#dbe0e6] h-14 placeholder:text-[#617589] p-[15px] rounded-r-none border-r-0 pr-2 text-base font-normal leading-normal"
                        value=""
                    />
                    <div
                        class="text-[#617589] flex border border-[#dbe0e6] bg-white items-center justify-center pr-[15px] rounded-r-xl border-l-0"
                        data-icon="Lock"
                        data-size="24px"
                        data-weight="regular"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24px"
                            height="24px"
                            fill="currentColor"
                            viewBox="0 0 256 256"
                        >
                            <path
                                d="M208,80H176V56a48,48,0,0,0-96,0V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80ZM96,56a32,32,0,0,1,64,0V80H96ZM208,208H48V96H208V208Zm-68-56a12,12,0,1,1-12-12A12,12,0,0,1,140,152Z"
                            ></path>
                        </svg>
                    </div>
                </div>
            </label>
        </div>
        <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
            <label class="flex flex-col min-w-40 flex-1">
                <p
                    class="text-[#111418] text-base font-medium leading-normal pb-2"
                >
                    Account Number
                </p>
                <div class="flex w-full flex-1 items-stretch rounded-xl">
                    <input
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border border-[#dbe0e6] bg-white focus:border-[#dbe0e6] h-14 placeholder:text-[#617589] p-[15px] rounded-r-none border-r-0 pr-2 text-base font-normal leading-normal"
                        value=""
                    />
                    <div
                        class="text-[#617589] flex border border-[#dbe0e6] bg-white items-center justify-center pr-[15px] rounded-r-xl border-l-0"
                        data-icon="Lock"
                        data-size="24px"
                        data-weight="regular"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24px"
                            height="24px"
                            fill="currentColor"
                            viewBox="0 0 256 256"
                        >
                            <path
                                d="M208,80H176V56a48,48,0,0,0-96,0V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80ZM96,56a32,32,0,0,1,64,0V80H96ZM208,208H48V96H208V208Zm-68-56a12,12,0,1,1-12-12A12,12,0,0,1,140,152Z"
                            ></path>
                        </svg>
                    </div>
                </div>
            </label>
        </div>
        <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
            <label class="flex flex-col min-w-40 flex-1">
                <p
                    class="text-[#111418] text-base font-medium leading-normal pb-2"
                >
                    Routing Number
                </p>
                <div class="flex w-full flex-1 items-stretch rounded-xl">
                    <input
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border border-[#dbe0e6] bg-white focus:border-[#dbe0e6] h-14 placeholder:text-[#617589] p-[15px] rounded-r-none border-r-0 pr-2 text-base font-normal leading-normal"
                        value=""
                    />
                    <div
                        class="text-[#617589] flex border border-[#dbe0e6] bg-white items-center justify-center pr-[15px] rounded-r-xl border-l-0"
                        data-icon="Lock"
                        data-size="24px"
                        data-weight="regular"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24px"
                            height="24px"
                            fill="currentColor"
                            viewBox="0 0 256 256"
                        >
                            <path
                                d="M208,80H176V56a48,48,0,0,0-96,0V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80ZM96,56a32,32,0,0,1,64,0V80H96ZM208,208H48V96H208V208Zm-68-56a12,12,0,1,1-12-12A12,12,0,0,1,140,152Z"
                            ></path>
                        </svg>
                    </div>
                </div>
            </label>
        </div>
        <!-- Keep your original blocks but wrapped inside this max-w centered container -->

        <div class="flex justify-stretch">
            <div class="flex flex-1 gap-3 flex-wrap px-4 py-3">
                <button
                    class="flex min-w-[84px] py-2 px-4 bg-[#1172d4] text-white rounded-xl font-bold"
                >
                    Generate Invoice
                </button>
                <button
                    class="flex min-w-[84px] py-2 px-4 bg-[#1172d4] text-white rounded-xl font-bold"
                >
                    Generate PDF
                </button>
            </div>
        </div>
    </div>
</template>
