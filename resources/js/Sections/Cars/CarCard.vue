<script setup>
import { onMounted } from "vue";
import 'flowbite';

onMounted(() => {
  import('flowbite').then((module) => {
    module.initFlowbite(); // 🔥 Re-inicializa Flowbite después de que Vue carga el DOM
  });
});

const priceFormat = (price) => {
  return new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR' }).format(price);
};
</script>


<template>
    <div class="bg-gray-200 rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105 max-w-80">
        
            <div class="relative h-48 overflow-hidden">

                <div id="default-carousel" class="relative w-full" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative h-48 overflow-hidden rounded-t-lg md:h-48">
                        <div v-for="(image, index) in car.images" :key="car.id" class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img :src="image.image_url" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover object-center" :alt="car.brand">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button v-for="(image, index) in car.images" :key="car.id" type="button" class="w-3 h-3 rounded-full" aria-current="true" :aria-label="`Slide ${index}`"
                        :data-carousel-slide-to="index"></button>
                    </div>

                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previa</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">Siguiente</span>
                        </span>
                    </button>
                </div>

                <img 
                    :src="car.src"
                    :alt="car.registration"
                    class="w-full h-full object-cover object-center"
                />
            </div>      


            <div class="p-4">
                <h3 class="text-gray-800 font-semibold mb-1">{{ car.brand + ' ' + car.model }}</h3>
                <h3 class="text-gray-500 font-light truncate">{{ car.description }}</h3>
                <p class="text-gray-700 font-light text-xs truncate">{{ car.fuel + ' | ' + car.km + ' km' + ' | ' + car.cv + ' CV' + ' | ' + car.year}}</p>
            </div>

            <div class="flexAround gap-3 mx-3 mb-3">
                <Link :href="`/cars/${car.id}/show`" class="border-2 border-primary-700 w-full h-12 rounded-2xl text-center p-1">
                    <p class="text-xs text-gray-500">Precio</p>
                    <p class=" font-semibold text-gray-700">{{ priceFormat(car.price) }} </p>
                </Link>

                <Link class="bg-yellow-500 w-full h-12 rounded-2xl flex items-center justify-center font-semibold" :href="`/cars/${car.id}/show`">
                    Lo quiero      
                </Link>
                
                <img v-if="car.sticker == 'B'" class="size-10" src="../../../img/etiqueta_b.png" alt="logo mcauto13">
                <img v-if="car.sticker == 'C'" class="size-10" src="../../../img/etiqueta_c.png" alt="logo mcauto13">
                <img v-if="car.sticker == 'ECO'" class="size-10" src="../../../img/etiquetaeco.png" alt="logo mcauto13">
                <img v-if="car.sticker == 'Cero emisiones'" class="size-10" src="../../../img/etiqueta0.png" alt="logo mcauto13">
            </div> 
    </div>
</template>

<script>
    export default {
        props: {
            car: Object
        },

        name: 'CarCard',
    }
</script>

<style lang="scss" scoped>

</style>