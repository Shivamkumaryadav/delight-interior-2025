<script setup>
import ErrorMessage from "@/components/ErrorMessage.vue";
import NavigationLink from "@/components/NavigationLink.vue";
import SelectInput from "@/components/SelectInput.vue";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import AdminLayout from "@/Pages/Layouts/AdminLayout.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";

const page = usePage();
const films = computed(() => page.props.films);

const totalPrice = ref(0);
const gstAmount = ref(0);
const sgstAmount = ref(0);
const grandTotal = ref(0);

const form = useForm({
    length: "",
    film_type: "",
    price: "",
    gst: 9,
    sgst: 9,
    film_calculations: {
        totalPrice: null,
        gstAmount: null,
        sgstAmount: null,
        grandTotal: null,
        film_type: null,
        length: null,
        price: null,
    },
});

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

//function to send the data to the controller
function store() {
    // calculating the data before storing
    calculate();
    // seeting the data for films calculations before sending to the form
    form.film_calculations.totalPrice = totalPrice.value.toFixed(2);
    form.film_calculations.gstAmount = gstAmount.value.toFixed(2);
    form.film_calculations.sgstAmount = sgstAmount.value.toFixed(2);
    form.film_calculations.grandTotal = grandTotal.value.toFixed(2);
    form.film_calculations.film_type = form.film_type;
    form.film_calculations.price = form.price;
    form.film_calculations.length = form.length;

    // now ready to send the data
    form.post("/admin/calculator");
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
</script>

<template>
    <AdminLayout>
        <div class="flex text-white font-sans mb-5">
            <h3>Dashboard</h3>
            /calculator
        </div>

        <div
            class="bg-primary shadow-md mt-16 rounded-lg p-4 border border-gray-200"
        >
            <h3 class="text-xl font-semibold text-center uppercase">
                Calculate Film Price
            </h3>
            <form @submit.prevent="store">
                <div
                    class="space-y-5 md:space-y-0 md:flex md:gap-10 lg:gap-x-32 my-5"
                >
                    <div class="space-y-1 flex-1">
                        <Label for="length">Length (in sqft)</Label>
                        <Input class="flex" v-model="form.length" />
                        <ErrorMessage :error="form.errors.length" />
                    </div>
                    <div class="space-y-1 flex-1">
                        <Label for="price"
                            >Price (per sqft in indian rupees)</Label
                        >
                        <Input
                            class="flex"
                            v-model="form.price"
                            placeholder="Film price"
                        />
                        <ErrorMessage :error="form.errors.price" />
                    </div>
                </div>
                <div
                    class="space-y-5 md:space-y-0 md:flex md:gap-10 lg:gap-x-32 my-5"
                >
                    <div class="space-y-1 flex-1">
                        <Label for="gst">GST (in %)</Label>
                        <Input class="flex" v-model="form.gst" />
                        <ErrorMessage :error="form.errors.gst" />
                    </div>
                    <div class="space-y-1 flex-1">
                        <Label for="gst">SGST (in %)</Label>
                        <Input class="flex" v-model="form.sgst" />
                        <ErrorMessage :error="form.errors.sgst" />
                    </div>
                </div>

                <div
                    class="space-y-5 md:space-y-0 md:flex md:gap-10 lg:gap-x-32 my-5"
                >
                    <div class="space-y-1 flex-1">
                        <SelectInput
                            class=""
                            v-model="form.film_type"
                            :options="films"
                            option-label="name"
                            option-value="id"
                            label="Film Type"
                            name="name"
                            id="film"
                            placeholder="Please select a film"
                        />
                        <ErrorMessage :error="form.errors.film_type" />
                    </div>
                    <div class="space-y-1 flex-1"></div>
                </div>

                <!-- show the calculated details here -->
                <div>
                    <div class="border-b pb-4 pt-2">
                        <div class="flex justify-between gap-8 items-center">
                            <h3>Total Price:(without gst)</h3>
                            <div>₹ {{ totalPrice.toFixed(2) }}</div>
                        </div>
                    </div>
                    <div class="border-b pb-4 pt-2">
                        <div class="flex justify-between gap-8 items-center">
                            <h3>GST ({{ form.gst }}%):</h3>
                            <div>₹ {{ gstAmount.toFixed(2) }}</div>
                        </div>
                    </div>
                    <div class="border-b pb-4 pt-2">
                        <div class="flex justify-between gap-8 items-center">
                            <h3>SGST ({{ form.sgst }}%):</h3>
                            <div>₹ {{ sgstAmount.toFixed(2) }}</div>
                        </div>
                    </div>
                    <div class="border-b pb-4 pt-2">
                        <div class="flex justify-between gap-8 items-center">
                            <h3>Grand Total:</h3>
                            <div>₹ {{ grandTotal.toFixed(2) }}</div>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <button
                        type="submit"
                        class="cursor-pointer w-full bg-button hover:bg-button-hover text-white font-semibold py-3 px-4 rounded-md transition duration-300"
                    >
                        Send via Email
                    </button>
                </div>
            </form>
        </div>
        <!-- <div class="mt-6 space-y-2">
            <p class="text-white font-semibold">
                Total Price: ₹ {{ totalPrice.toFixed(2) }}
            </p>
            <p class="text-white font-semibold">
                GST ({{ form.gst }}%): ₹ {{ gstAmount.toFixed(2) }}
            </p>
            <p class="text-white font-semibold">
                SGST ({{ form.sgst }}%): ₹ {{ sgstAmount.toFixed(2) }}
            </p>
            <p class="text-white font-bold text-lg">
                Grand Total: ₹ {{ grandTotal.toFixed(2) }}
            </p>
        </div> -->
    </AdminLayout>
</template>
