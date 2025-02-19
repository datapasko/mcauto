<template>
    <div class="max-container mb-5 py-14">
        
        <div class="p-4 text-center mb-12">
            <h2 class="font-bold mb-2 text-xl md:text-3xl">Nuestros Servicios en <span class="text-primary-500">McAuto13</span></h2>
            <p class="font-light ">Tu concesionario de confianza para <span class="text-primary-500">comprar, vender y financiar</span> tu coche con total seguridad. Ofrecemos asesoramiento experto, tasación justa y vehículos revisados con garantía. ¡Descubre todo lo que podemos hacer por ti!</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 py-5">
            <div v-for="(item, index) in services" :key="index" class="block border border-gray-200 rounded-lg hover:bg-primary-100 hover:border-primary-500 hover:shadow-sm focus:outline-none dark:border-neutral-700">
                <a type="button" @click="openModal">
                    <div class="relative flex items-center overflow-hidden">
                        <img class="w-32 sm:w-48 h-full absolute inset-0 object-cover rounded-s-lg" :src="item.img" alt="alquiler de coche">

                        <div class="grow p-4 ms-32 sm:ms-48">
                            <div class="min-h-24 flex flex-col justify-center">
                                <h3 class="font-semibold text-xl text-gray-800 dark:text-neutral-300">
                                    {{  item.title }}
                                </h3>
                                <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                                    {{ item.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>            
        </div>


        <div class="text-center mt-5">
            <button type="button" class="bg-primary-500 gap-x-2 text-white text-nowrap rounded-xl border border-transparent font-semibold px-4 py-2 mt-10 hover:bg-primary-600 focus:outline-none focus:bg-primary-600 transition disabled:opacity-50 disabled:pointer-events-none" @click="openModal">Agendar cita</button>
            
            <ServiceModal :open="isOpen" @close="isOpen = !isOpen"></ServiceModal>
        </div>      

    </div>
</template>

<script>
    import imgTaller from "../../img/services/taller.webp"
    import imgComprar from "../../img/services/comprar.webp"
    import imgLimpieza from "../../img/services/limpieza.webp"
    import imgSeguro from "../../img/services/seguro.webp"
    import imgItv from "../../img/services/itv.webp"
    import imgFurgoneta from "../../img/services/furgoneta.webp"
    import ServiceModal from "../Sections/Modals/ServiceModal.vue"
    import { ref } from 'vue'

    export default {
        name: 'Services',

        components: {
            ServiceModal
        },

        data() {
            return {
                services: [
                    {
                        title: 'Compramos tu coche', 
                        img: imgComprar, 
                        description: 'En McAuto13, tasamos tu vehículo sin compromiso y te ofrecemos una oferta justa al instante. Pago inmediato y sin complicaciones. ¡Véndelo hoy mismo con total confianza!'
                    },
                    {
                        title: 'Taller de mecánica', 
                        img: imgTaller, 
                        description: 'Mantén tu coche en perfecto estado con nuestro servicio de mecánica profesional. Desde mantenimiento preventivo hasta reparaciones avanzadas, nos encargamos de todo con rapidez y garantía.'
                    },
                    {
                        title: 'Alquila tu furgoneta', 
                        img: imgFurgoneta, 
                        description: '¿Necesitas una furgoneta para tu mudanza, trabajo o viaje? Te ofrecemos un servicio de alquiler rápido, fácil y sin complicaciones, con vehículos en perfecto estado y a precios competitivos.'
                    },
                    {
                        title: 'Revisión Previa ITV', 
                        img: imgItv, 
                        description: '¿Te preocupa que tu vehículo no pase la ITV? Con nuestro servicio de revisión previa, detectamos y solucionamos posibles fallos antes de la inspección, aumentando las probabilidades de éxito.'
                    },
                    {
                        title: 'Limpieza, mantenimiento y cuidado', 
                        img: imgLimpieza, 
                        description: 'Tu coche merece estar siempre en las mejores condiciones, por dentro y por fuera. Ofrecemos servicios de limpieza profesional, mantenimiento y cuidado para que tu vehículo luzca impecable y funcione a la perfección.'
                    },
                    {
                        title: 'Protección total con seguros a medida', 
                        img: imgSeguro, 
                        description: 'Conduce con total tranquilidad con nuestros seguros personalizados. Encuentra la cobertura que mejor se adapta a ti y a tu coche, con las mejores condiciones y sin costos ocultos.'
                    },
                ]
            }
        },

        setup () {
            const isOpen = ref(false)

            const openModal = () => {
                isOpen.value = true
                return isOpen.value
            }

            return {
                isOpen, openModal
            }
        }
        
    }
</script>