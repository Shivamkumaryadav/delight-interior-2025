<template>
  <div class="w-full mx-auto relative">
    <!-- Splide Carousel -->
    <Splide ref="splide" :options="splideOptions" class="custom-slider">
      <SplideSlide v-for="(item, index) in items" :key="index">
        <!-- Default slot content -->
        <slot name="card" :item="item">
          <!-- Default card if no slot provided -->
          Please provide a slot card with name card and prop as item
        </slot>
      </SplideSlide>
    </Splide>

    <!-- Custom arrows -->
    <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 flex justify-between z-20">
      <button
        class="bg-white text-gray-800 shadow rounded-full w-10 h-10 flex items-center justify-center -ml-5"
        type="button"
        aria-label="Previous"
        @click="goPrev"
      >
        <ChevronLeft class="w-6 h-6" />
      </button>
      <button
        class="bg-white text-gray-800 shadow rounded-full w-10 h-10 flex items-center justify-center -mr-5"
        type="button"
        aria-label="Next"
        @click="goNext"
      >
        <ChevronRight class="w-6 h-6" />
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { Splide, SplideSlide } from "@splidejs/vue-splide";
import "@splidejs/vue-splide/css";
import { ChevronLeft, ChevronRight } from "lucide-vue-next";

// Props
defineProps({
  items: {
    type: Array,
    default: () => [],
  },
  defaultImage: {
    type: String,
    default:
      "https://media.istockphoto.com/id/680906456/photo/cloud-and-blue-sky-from-the-airplane-windows.jpg?s=612x612&w=0&k=20&c=yQM3tgfPSg38izkIo9lgc2OcKsWYhROzjEBcTp8Y7ko=",
  },
  perPage: {
    type: Number,
    default: 4,
  },
});

// Splide ref
const splide = ref(null);

// Splide options
const splideOptions = {
  type: "loop",
  autoplay: true,
  pauseOnHover: true,
  arrows: false,
  pagination: false,
  perPage: 4,
  gap: "1.5rem",
  breakpoints: {
    1280: { perPage: 5, gap: "1rem" },
    1024: { perPage: 3, gap: "1rem" },
    640: { perPage: 2, gap: "0.75rem" },
  },
};

// Navigation functions
const goPrev = () => splide.value?.splide?.go("<");
const goNext = () => splide.value?.splide?.go(">");
</script>
