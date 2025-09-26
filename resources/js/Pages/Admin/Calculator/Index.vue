<template>
    <div class="flex font-sans mb-5">
        <h3>Dashboard</h3>
        /calculator
    </div>

    <div
        class="bg- shadow-md mt-16 rounded-lg border border-gray-200 max-w-5xl mx-auto"
    >
        <form @submit.prevent="store" class="mx-auto p-6 space-y-6">
            <!-- Title -->
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-900">
                    Invoice Calculator
                </h1>
            </div>

            <!-- Add Invoice Item -->
            <h3 class="text-lg font-semibold text-gray-900">
                Add Invoice Item
            </h3>

            <!-- Quantity + Unit Price -->
            <div class="flex flex-col sm:flex-row gap-4">
                <label class="flex-1">
                    <p class="text-sm font-medium text-gray-800 pb-1">
                        Film Name
                    </p>
                    <input
                        v-model="form.film_name"
                        placeholder="Enter film name"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-gray-900"
                    />
                    <ErrorMessage :error="form.errors.film_name" />
                </label>
            </div>

            <!-- Quantity + Unit Price -->
            <div class="flex flex-col sm:flex-row gap-4">
                <label class="flex-1">
                    <p class="text-sm font-medium text-gray-800 pb-1">
                        Length (in sqft)
                    </p>
                    <input
                        v-model="form.length"
                        placeholder="Enter length"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-gray-900"
                    />
                    <ErrorMessage :error="form.errors.length" />
                </label>

                <label class="flex-1">
                    <p class="text-sm font-medium text-gray-800 pb-1">
                        Unit Price
                    </p>
                    <input
                        v-model="form.price"
                        placeholder="Enter unit price"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-gray-900"
                    />
                    <ErrorMessage :error="form.errors.price" />
                </label>
            </div>

            <!-- CGST + SGST -->
            <div class="flex flex-col sm:flex-row gap-4">
                <label class="flex-1">
                    <p class="text-sm font-medium text-gray-800 pb-1">
                        CGST (%)
                    </p>
                    <input
                        v-model="form.gst"
                        placeholder="Enter gst %"
                        inputmode="numeric"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-gray-900"
                    />
                    <ErrorMessage :error="form.errors.gst" />
                </label>

                <label class="flex-1">
                    <p class="text-sm font-medium text-gray-800 pb-1">
                        SGST (%)
                    </p>
                    <input
                        v-model="form.sgst"
                        placeholder="Enter SGST %"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-gray-900"
                    />
                    <ErrorMessage :error="form.errors.sgst" />
                </label>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between gap-3">
                <button
                    type="button"
                    @click="resetForm"
                    class="px-4 py-2 rounded-lg bg-gray-100 text-gray-800 border border-red-500 font-semibold hover:bg-gray-200"
                >
                    Reset Form
                </button>
                <button
                    type="submit"
                    class="px-4 py-2 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-700"
                >
                    Add Item
                </button>
            </div>

            <div v-if="items.length" ref="invoiceSection">
                <!-- Invoice Items Table -->
                <div class="flex justify-between items-center gap-5">
                    <h3 class="text-xl font-bold text-gray-900">
                        Invoice Items
                    </h3>

                    <div>
                        <h3
                            type="button"
                            @click="clearInvoices"
                            class="cursor-pointer text-sm bg-red-500 px-2 py-2 text-white rounded-lg"
                        >
                            Clear Invoices
                        </h3>
                    </div>
                </div>

                <div
                    class="overflow-x-auto rounded-lg border border-gray-300 mt-5"
                >
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="bg-gray-100 text-gray-900">
                            <tr>
                                <th class="px-4 py-2 whitespace-nowrap">
                                    Item
                                </th>
                                <th class="px-4 py-2 whitespace-nowrap">
                                    Length (in sqft)
                                </th>
                                <th class="px-4 py-2 whitespace-nowrap">
                                    Price
                                </th>
                                <th class="px-4 py-2 whitespace-nowrap">
                                    CGST
                                </th>
                                <th class="px-4 py-2 whitespace-nowrap">
                                    SGST
                                </th>
                                <th class="px-4 py-2 whitespace-nowrap">
                                    Sub Total
                                </th>
                                <th class="px-4 py-2 whitespace-nowrap">
                                    Remove Item
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(item, index) in items"
                                :key="index"
                                class="border-t border-gray-200 text-black text-lg"
                            >
                                <td class="px-4 py-2 whitespace-nowrap">
                                    {{ item.film_name }}
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap">
                                    ₹ {{ item.length }}
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap">
                                    ₹ {{ item.price }}
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap">
                                    {{ item.gst }}%
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap">
                                    {{ item.sgst }}%
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap">
                                    ₹ {{ item.totalPrice }}
                                </td>
                                <td
                                    class="px-4 py-2 whitespace-nowrap text-red-500 cursor-pointer"
                                >
                                    <Trash @click="removeItem(index)" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Grand Total -->
                <p class="text-center text-[20px] font-bold my-3">
                    Grand Total: ₹ {{ grandTotal.toFixed(2) }}
                </p>
                <div class="mt-4 w-full">
                    <Link
                        href="/admin/calculator/show"
                        class="px-3 py-2 cursor-pointer rounded-lg text-white border border-red-500 font-semibold bg-red-500"
                    >
                        Generate Invoice
                    </Link>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import ErrorMessage from "@/components/ErrorMessage.vue";
import NavigationLink from "@/components/NavigationLink.vue";
import ProcesingButton from "@/components/ProcesingButton.vue";
import SelectInput from "@/components/SelectInput.vue";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import AdminLayout from "@/Pages/Layouts/AdminLayout.vue";
import { Link, router, useForm, usePage } from "@inertiajs/vue3";
import { Trash } from "lucide-vue-next";
import { computed, ref, watch, nextTick } from "vue";

const page = usePage();
const films = computed(() => page.props.films);
const items = computed(() => page.props.items);

const invoiceSection = ref(null);
const totalPrice = ref(0);
const gstAmount = ref(0);
const sgstAmount = ref(0);
const grandTotal = ref(0);

const form = useForm({
    length: "",
    film_name: "",
    price: "",
    gst: 9,
    sgst: 9,
    film_calculations: {
        totalPrice: null,
        gstAmount: null,
        sgstAmount: null,
        grandTotal: null,
        film_name: null,
        length: null,
        price: null,
    },
});

// function to generate the invoice
function generateInvoice() {
    router.post(
        "/admin/invoice-generate",
        {},
        {
            onSuccess: (page) => {
                // Open the generated PDF in a new tab
                if (page.props.pdf_url) {
                    window.open(page.props.pdf_url, "_blank");
                }
            },
            onError: (errors) => {
                console.error("Error generating invoice:", errors);
            },
            preserveScroll: true,
        },
    );
}

// function to calulate
function calculate() {
    const length = parseFloat(form.length) || 0;
    const price = parseFloat(form.price) || 0;
    const gst = parseFloat(form.gst) || 0;
    const sgst = parseFloat(form.sgst) || 0;

    totalPrice.value = length * price;
    gstAmount.value = (totalPrice.value * gst) / 100;
    sgstAmount.value = (totalPrice.value * sgst) / 100;
    grandTotal.value = totalPrice.value + gstAmount.value + sgstAmount.value;
}

// Function to remove the item from the session
function removeItem(index) {
    if (!confirm("Are you sure you want to remove this item?")) return;

    router.delete("/admin/calculator/remove-item", {
        data: { index }, // send the item index
        preserveScroll: true, // optional: keep scroll position
    });
}

// Clear all the invoices
function clearInvoices() {
    router.delete("/admin/calculator/delete", {
        preserveScroll: true,
    });
}

//function to send the data to the controller
function store() {
    // calculating the data before storing
    calculate();
    // seeting the data for films calculations before sending to the form
    form.film_calculations.totalPrice = totalPrice.value.toFixed(2);
    form.film_calculations.gstAmount = gstAmount.value.toFixed(2);
    form.film_calculations.sgstAmount = sgstAmount.value.toFixed(2);
    form.film_calculations.grandTotal = grandTotal.value.toFixed(2);
    form.film_calculations.film_name = form.film_name;
    form.film_calculations.price = form.price;
    form.film_calculations.length = form.length;

    // now ready to send the data
    form.post("/admin/calculator", {
        onSuccess: () => {
            // Wait for DOM update
            nextTick(() => {
                if (invoiceSection.value) {
                    invoiceSection.value.scrollIntoView({ behavior: "smooth" });
                }
            });
        },
    });
}

//watcher is watching the calulator any form vaue is changed then re calculate it
watch(
    () => [form.length, form.price, form.gst, form.sgst], //watching these properties for trigger the re-calculations
    () => {
        const length = parseFloat(form.length) || 0;
        const price = parseFloat(form.price) || 0;
        const gst = parseFloat(form.gst) || 0;
        const sgst = parseFloat(form.sgst) || 0;

        totalPrice.value = length * price;
        gstAmount.value = (totalPrice.value * gst) / 100;
        sgstAmount.value = (totalPrice.value * sgst) / 100;
        grandTotal.value =
            totalPrice.value + gstAmount.value + sgstAmount.value;
    },
    { immediate: true }, // to call the function immediately
);

// Watcher to calculate grand total whenever items change
watch(
    items,
    (newItems) => {
        let subtotal = 0;
        let gstTotal = 0;
        let sgstTotal = 0;

        newItems.forEach((item) => {
            const price = parseFloat(item.totalPrice) || 0;
            const gst = parseFloat(item.gst) || 0;
            const sgst = parseFloat(item.sgst) || 0;

            const gstAmount = (price * gst) / 100;
            const sgstAmount = (price * sgst) / 100;
            const itemGrandTotal = price + gstAmount + sgstAmount;

            // Store per-item computed totals if you want to display
            item.gst_amount = gstAmount.toFixed(2);
            item.sgst_amount = sgstAmount.toFixed(2);
            item.grand_total = itemGrandTotal.toFixed(2);

            subtotal += price;
            gstTotal += gstAmount;
            sgstTotal += sgstAmount;
        });

        // totalPrice.value = subtotal;
        // totalGstAmount.value = gstTotal;
        // totalSgstAmount.value = sgstTotal;
        grandTotal.value = subtotal + gstTotal + sgstTotal;
    },
    { deep: true, immediate: true },
);
</script>
