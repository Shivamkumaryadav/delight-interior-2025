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
    <AdminLayout>
        <div class="flex text-white font-sans mb-5">
            <h3>Dashboard</h3>
            /calculator
        </div>

        <div class="bg-white mt-16 rounded-lg p-4">
            <h3 class="text-xl font-semibold text-center uppercase">
                Send Calulation details on Mail
            </h3>
            <form @submit.prevent="store" class="my-6">
                <div class="lg:flex justify-between gap-6 lg:space-y-0 space-y-5">
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

                    <!-- show the calculated details here -->
                    <div class="w-full">
                        <div class="border-b pb-4 pt-2">
                            <div
                                class="flex justify-between gap-8 items-center"
                            >
                                <h3>Total Price:(without gst)</h3>
                                <div>₹ {{ calculations.totalPrice }}</div>
                            </div>
                        </div>
                        <div class="border-b pb-4 pt-2">
                            <div
                                class="flex justify-between gap-8 items-center"
                            >
                                <h3>GST ({{ form.gst }}%):</h3>
                                <div>₹ {{ calculations.gstAmount }}</div>
                            </div>
                        </div>
                        <div class="border-b pb-4 pt-2">
                            <div
                                class="flex justify-between gap-8 items-center"
                            >
                                <h3>SGST ({{ form.sgst }}%):</h3>
                                <div>₹ {{ calculations.sgstAmount }}</div>
                            </div>
                        </div>
                        <div class="border-b pb-4 pt-2">
                            <div
                                class="flex justify-between gap-8 items-center"
                            >
                                <h3>Grand Total:</h3>
                                <div>₹ {{ calculations.grandTotal }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-6 mt-16 space-y-5 lg:space-y-0 lg:flex gap-6">
                    <Button
                        type="submit"
                        class="cursor-pointer w-full border border-button  hover:bg-button-hover hover:text-white font-semibold py-2 px-4 rounded-md transition duration-300"
                    >
                        Back to calculator
                    </Button>
                    <Button
                        type="submit"
                        class="cursor-pointer w-full bg-button hover:bg-button-hover text-white font-semibold py-2 px-4 rounded-md transition duration-300"
                    >
                        Preview Pdf
                    </Button>

                    <Button
                        type="submit"
                        class="cursor-pointer w-full border border-button hover:bg-button-hover text-black hover:text-white font-semibold py-2 px-4 rounded-md transition duration-300"
                    >
                        Send Email
                    </Button>
                    <Button
                        type="submit"
                        class="cursor-pointer w-full bg-button hover:bg-button-hover text-white font-semibold py-2 px-4 rounded-md transition duration-300"
                    >
                        Download Pdf
                    </Button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
