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
});
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
function store() {
    calculate();
    form.post("/admin/calculator");
}

watch(
    () => [form.length, form.price, form.gst, form.sgst],
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
    { immediate: true },
);
</script>

<template>
    <AdminLayout>
        <div class="flex text-white font-sans mb-5">
            <h3>Dashboard</h3>
            /calculator
        </div>

        <div class="bg-white mt-16 rounded-lg p-4">
            <h3 class="text-xl font-semibold text-center uppercase">
                Calculate Film Price
            </h3>
            <form @submit.prevent="store">
                <div class="space-y-5 md:space-y-0 md:flex gap-x-32 my-5">
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
                <div class="space-y-5 md:space-y-0 md:flex gap-x-32 my-5">
                    <div class="space-y-1 flex-1">
                        <Label for="gst">GST (in %)</Label>
                        <Input class="flex" v-model="form.gst" />
                        <ErrorMessage :error="form.errors.gst" />
                    </div>
                    <div class="space-y-1 flex-1">
                        <Label for="gst">GST (in %)</Label>
                        <Input class="flex" v-model="form.gst" />
                        <ErrorMessage :error="form.errors.gst" />
                    </div>
                </div>
                <div class="space-y-5 md:space-y-0 my-5">
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

                <!-- show the calculated details here -->
                 <div>
                    <div class="border-b pb-4 pt-2">
                        <h3> Total Price: ₹ {{ totalPrice.toFixed(2) }}</h3>
                    </div>
                    <div class="border-b pb-4 pt-2">
                        <h3> GST ({{ form.gst }}%): ₹ {{ gstAmount.toFixed(2) }}</h3>
                    </div>
                    <div class="border-b pb-4 pt-2">
                        <h3>  SGST ({{ form.sgst }}%): ₹ {{ sgstAmount.toFixed(2) }}</h3>
                    </div>
                    <div class="border-b pb-4 pt-2 bg-green-500 text-white">
                        <h3>  Grand Total: ₹ {{ grandTotal.toFixed(2) }}</h3>
                    </div>
                 </div>
                <div class="mt-6">
                    <button
                        type="submit"
                        class="cursor-pointer w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300"
                    >
                        Send as email
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
