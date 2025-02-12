<template>
    <div class=" bg-neutral-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-6 pt-16">
            <div class="p-4">

                <h2 class="font-bold mb-2 text-xl md:text-3xl">Compramos tu coche. <span class="text-primary-500">Rápido, seguro</span> y con pago inmediato.</h2>

                <ul class="mt-5">
                    <li class="flexStart mb-2">
                        <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-5 mr-2 fill-primary-700">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
                        </svg> Te damos el mejor precio
                    </li>
                    <li class="flexStart mb-2">
                        <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-5 mr-2 fill-primary-700">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
                        </svg> Pagamos en el acto
                    </li>
                    <li class="flexStart mb-2">
                        <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-5 mr-2 fill-primary-700">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
                        </svg> Nos encargamos de todos los tramites
                    </li>
                    <li class="flexStart mb-2">
                        <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-5 mr-2 fill-primary-700">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
                        </svg> Transferencia en el mismo dia y sin coste adicional
                    </li>
                    <li class="flexStart">
                        <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-5 mr-2 fill-primary-700">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
                        </svg> Aceptamos tu vehiculo como forma de pago
                    </li>
                </ul>

                <button type="button" class="bg-yellow-500 gap-x-2 text-black text-nowrap rounded-xl border border-transparent font-semibold px-4 py-2 mt-10 hover:bg-yellow-600 focus:outline-none focus:bg-yellow-600 transition disabled:opacity-50 disabled:pointer-events-none" @click="openModal">¡Descubre cuánto vale tu coche!</button>

                <BuyCarModal :open="isOpen" @close="isOpen = !isOpen"></BuyCarModal>

            </div>

            
            <div class="p-10">
                <img 
                        src="../../img/1187.jpg"
                        alt="car.registration"
                        class="w-full h-full object-cover object-center rounded-4xl transition-transform duration-300 hover:scale-105"
                    />
            </div>

        </div>

    </div>
</template>

<script>
    import BuyCarModal from '../Sections/Modals/BuyCarModal.vue'
    import { ref } from 'vue'
    export default {
        name: 'BuyCar',

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