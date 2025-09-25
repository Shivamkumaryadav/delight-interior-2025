<script setup>
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
const calculations = computed(() => page.props.calculations);

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
        <div class="flex text-white font-sans mb-5">
            <h3>Dashboard</h3>
            /calculator
        </div>

        <div class="bg-white mt-16 rounded-lg p-4">
            <h3 class="text-xl font-semibold text-center uppercase">
                Send Calulation details on Mail
            </h3>
            <form @submit.prevent="store" class="my-6">
                <div
                    class="w-full max-w-2xl mx-auto bg-background-light dark:bg-background-dark rounded-xl shadow-lg overflow-hidden border border-border-light dark:border-border-dark"
                >
                    <div class="p-6 sm:p-8">
                        <h2
                            class="text-2xl sm:text-3xl font-bold text-foreground-light dark:text-foreground-dark mb-6"
                        >
                            Cost Summary
                        </h2>
                        <div class="space-y-4 text-sm">
                            <div
                                class="flex justify-between items-center py-4 border-border-border-light dark:border-border-dark"
                            >
                                <!-- show the calculated details here -->
                                <div class="w-full">
                                    <div class="border-b pb-4 pt-2">
                                        <div
                                            class="flex justify-between gap-8 items-center"
                                        >
                                            <h3>Total Price:(without gst)</h3>
                                            <div>
                                                ₹ {{ calculations.totalPrice }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-b pb-4 pt-2">
                                        <div
                                            class="flex justify-between gap-8 items-center"
                                        >
                                            <h3>GST ({{ form.gst }}%):</h3>
                                            <div>
                                                ₹ {{ calculations.gstAmount }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-b pb-4 pt-2">
                                        <div
                                            class="flex justify-between gap-8 items-center"
                                        >
                                            <h3>SGST ({{ form.sgst }}%):</h3>
                                            <div>
                                                ₹ {{ calculations.sgstAmount }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-b pb-4 pt-2">
                                        <div
                                            class="flex justify-between gap-8 items-center"
                                        >
                                            <h3>Grand Total:</h3>
                                            <div>
                                                ₹ {{ calculations.grandTotal }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="flex justify-between items-center py-4 text-base"
                            >
                                <p
                                    class="font-bold text-foreground-light dark:text-foreground-dark"
                                >
                                    Grand Total
                                </p>
                                <p class="font-bold "><div>₹ {{ calculations.grandTotal }}</div></p>
                            </div>
                        </div>
                        <div class="w-full flex flex-col space-y-5">
                            <div class="space-y-1 w-full">
                                <Label for="email">User Email</Label>
                                <Input
                                    type="email"
                                    class="w-full"
                                    v-model="form.email"
                                />
                                <ErrorMessage :error="form.errors.email" />
                            </div>
                            <div class="space-y-1">
                                <Label for="offer_valid_date"
                                    >Offer valid Date
                                </Label>
                                <Input
                                    type="date"
                                    class="w"
                                    v-model="form.offer_valid_date"
                                />
                                <ErrorMessage
                                    :error="form.errors.offer_valid_date"
                                />
                            </div>
                        </div>

                        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <button
                                class="w-full bg-primary/10 dark:bg-primary/20  font-bold py-3 px-4 rounded-lg text-sm hover:bg-primary/20 dark:hover:bg-primary/30 transition-colors"
                            >
                                View PDF
                            </button>
                            <button
                                class="w-full bg-primary/10 dark:bg-primary/20  font-bold py-3 px-4 rounded-lg text-sm hover:bg-primary/20 dark:hover:bg-primary/30 transition-colors"
                            >
                                Send Mail
                            </button>
                            <button
                                class="w-full bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark text-foreground-light dark:text-foreground-dark font-bold py-3 px-4 rounded-lg text-sm hover:bg-border-light dark:hover:bg-border-dark transition-colors"
                            >
                                Back to Calculator
                            </button>
                            <button
                                class="w-full bg-primary  font-bold py-3 px-4 rounded-lg text-sm hover:bg-primary/90 transition-colors"
                            >
                                Save/Export
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
</template>
