<template>
    <div class="bg-[url(../img/logan.jpg)] bg-cover bg-center h-screen">
        <div class="bg-black/60 backdrop-blur-none h-screen"> 
            <div class="mx-auto px-4 sm:px-6 lg:px-12 pt-[40vh] ">

                <!-- Title -->
                <div class="max-w-2xl">
                    <h1 class="block font-bold text-white text-5xl">
                        Coches de ocasión a <span class="text-primary-500">precios increibles.</span>
                    </h1>
                </div>
                <!-- End Title -->

                <div class="py-10">
                    <p class="text-2xl italic text-white">Calidad y transparencia en cada vehículo.</p>
                </div>

                <!-- Buttons -->
                <div class="pt-15">
                    <Link class="py-2 px-4 inline-flex items-center gap-x-2 text-lg font-semibold rounded-lg border border-transparent bg-primary-600 text-white hover:bg-primary-700 focus:outline-none focus:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none" href="/coches-segunda-mano-barcelona">
                        Encuentra tu coche ideal
                    </Link>

                    <a class="ml-4 py-2 px-4 inline-flex items-center gap-x-2 text-lg font-semibold rounded-lg border-2 border-yellow-500  text-white hover:text-black hover:bg-yellow-500 focus:outline-none focus:bg-yellow-700 disabled:opacity-50 disabled:pointer-events-none" @click="openModal">
                        Vender mi coche
                    </a>

                    <BuyCarModal :open="isOpen" @close="isOpen = !isOpen"></BuyCarModal>
                </div>
                <!-- End Buttons -->            
            </div>
        </div>
    </div>
</template>

<script>
    import BuyCarModal from '../Sections/Modals/BuyCarModal.vue'
    import { ref } from 'vue'
    export default {
        name: 'Hero',

        components: {
            BuyCarModal
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

<style lang="scss" scoped>

</style>