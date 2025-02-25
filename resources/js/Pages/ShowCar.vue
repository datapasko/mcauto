<script setup>
import { ref, onMounted } from "vue";
import 'flowbite';

defineProps({ car: Object, cars: Array, })

const isOpen = ref(false)

const openModal = () => {
    isOpen.value = true
    return isOpen.value
}

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
    <div class="bg-neutral-100">        
        <div class="max-container pt-[15vh] md:pt-[20vh] pb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <div class="md:col-span-2">
                    <div id="default-carousel" class="relative w-full z-10" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative h-96 overflow-hidden rounded-lg md:h-[60dvh]">
                            <!-- Item 1 -->
                            <div  v-for="(image, index) in car.images" :key="car.id" class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img :src="image.image_url"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover object-center"
                                    :alt="image.brand">
                            </div>
                        </div>
                        <!-- Slider indicators -->
                        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                            <button v-for="(image, index) in car.images" :key="image.id" type="button" class="w-3 h-3 rounded-full" aria-current="true" :aria-label="`Slide ${index}`"
                                :data-carousel-slide-to="index"></button>
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>

                <div class="bg-neutral-200 rounded-lg p-4">
                        
                    <div>
                        <div class="flexBetween gap-3">
                            <h2 class="text-neutral-700 text-3xl font-bold">
                                {{ car.brand }}
                            </h2>
                            
                            <img v-if="car.sticker == 'B'" class="h-14" src="../../img/etiqueta_b.png" alt="logo mcauto13">
                            <img v-if="car.sticker == 'C'" class="h-14" src="../../img/etiqueta_c.png" alt="logo mcauto13">
                            <img v-if="car.sticker == 'ECO'" class="h-14" src="../../img/etiquetaeco.png" alt="logo mcauto13">
                            <img v-if="car.sticker == 'Cero emisiones'" class="h-14" src="../../img/etiqueta0.png" alt="logo mcauto13">
                        </div>
                        <p class="text-primary-900 text-lg font-medium">
                            {{ car.model }}
                        </p>
                        <p class="text-neutral-600 text-sm font-light">
                            {{ car.type_sale }}
                        </p>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-5 bg-white rounded-lg p-2">
                        <div>
                            <p class="text-neutral-500 text-xs font-medium">
                                Color
                            </p>
                            <span>{{ car.color }}</span>
                        </div> 
                        <div>
                            <p class="text-neutral-500 text-xs font-medium">
                                Transmisión
                            </p>
                            <span>{{ car.transmission }}</span>
                        </div> 
                        <div>
                            <p class="text-neutral-500 text-xs font-medium">
                                Año
                            </p>
                            <span>{{ car.year }}</span>
                        </div> 
                        <div>
                            <p class="text-neutral-500 text-xs font-medium">
                                Motor
                            </p>
                            <span>{{ car.fuel }}</span>
                        </div> 
                        <div>
                            <p class="text-neutral-500 text-xs font-medium">
                                Puertas
                            </p>
                            <span>{{ car.doors }}</span>
                        </div> 
                        <div>
                            <p class="text-neutral-500 text-xs font-medium">
                                Plazas
                            </p>
                            <span>{{ car.places }}</span>
                        </div> 
                        <div>
                            <p class="text-neutral-500 text-xs font-medium">
                                KM
                            </p>
                            <span>{{ car.km }}</span>
                        </div> 
                        <div>
                            <p class="text-neutral-500 text-xs font-medium">
                                CV
                            </p>
                            <span>{{ car.cv }}</span>
                        </div> 
                        
                        <div>
                            <p class="text-neutral-500 text-xs font-medium">
                                Cilindrada
                            </p>
                            <span>{{ car.cylindrical }}</span>
                        </div> 
                    </div>

                    
                    <div class="flexAround gap-3 mt-10">
                        <div class="border-2 border-primary-700 w-full h-12 rounded-2xl text-center p-1">
                            <p class="text-xs text-gray-500">Precio</p>
                            <p class=" font-semibold text-gray-700">{{ priceFormat(car.price) }}</p>
                        </div>

                        <button type="button" class="bg-yellow-500 gap-x-2 w-full h-12 text-black text-nowrap rounded-xl border border-transparent font-semibold p-1 hover:bg-yellow-600 focus:outline-none focus:bg-yellow-600 transition disabled:opacity-50 disabled:pointer-events-none" @click="openModal">Contactar</button>

                        <SaleCarModal :car="car" :open="isOpen" @close="isOpen = !isOpen"></SaleCarModal>

                    </div> 

                    
                </div>
            </div>

            <div class="max-container pt-16 pb-8">
                <div class="text-center">
                    <p class="text-primary-900 text-lg lg:text-xl font-semibold">
                        ¡Echa un vistazo a los últimos modelos disponibles!
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-14 sm:justify-center sm:items-center">
                    <CarCard v-for="item in cars" :key="item.id" :car="item" />
                </div>

                <div class="flexCenter mt-15">
                    <Link
                        class="bg-yellow-500 gap-x-2 text-medium text-nowrap rounded-xl border border-transparent font-semibold p-3 hover:bg-yellow-600 focus:outline-none focus:bg-yellow-600 transition disabled:opacity-50 disabled:pointer-events-none"
                        href="/coches-segunda-mano-barcelona">
                    Ver todos los coches
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CarCard from "../Sections/Cars/CarCard.vue";
    import SaleCarModal from '../Sections/Modals/SaleCarModal.vue'
    import { ref } from 'vue'

    export default {
        name: 'ShowCar',

        components: {
            SaleCarModal
        },        
    }
</script>

<style lang="scss" scoped>

</style>