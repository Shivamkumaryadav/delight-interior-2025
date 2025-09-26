<template>
        <h3>Films / Sun control films</h3>
       <div class="w-full rounded-xl relative">
            <div
                class="aspect-[4/3] sm:aspect-[16/9] lg:aspect-[21/9] w-full overflow-hidden"
            >
                <img
                    src="https://media.istockphoto.com/id/680906456/photo/cloud-and-blue-sky-from-the-airplane-windows.jpg?s=612x612&w=0&k=20&c=yQM3tgfPSg38izkIo9lgc2OcKsWYhROzjEBcTp8Y7ko="
                    alt="Film Image"
                    class="w-full h-full object-cover rounded-xl"
                />
            </div>

            <!-- image overlay text -->
            <div
                class="absolute inset-0 flex justify-center items-end mb-5 md:mb-10 px-5 text-white z-32"
            >
                <div class="text-start ">
                    <h3 class="lg:text-3xl font-semibold mb-2">
                        Lorem, ipsum dolor sit amet consectetur adipisicing
                        elit. Esse,
                    </h3>
                    <p class="text-sm">
                        Lorem, ipsum dolor sit amet consectetur adipisicing
                        elit. Esse, laudantium doloremque, adipisci sequi magnam
                        earum exercitationem recusandae dolorum perspiciatis ab,
                        tenetur quam alias praesentium dignissimos officiis
                        illum ea assumenda sunt?
                    </p>
                </div>
            </div>
        </div>
</template>
<script setup lang="ts">
import AppLayout from "@/Pages/Layouts/AppLayout.vue";
</script>
