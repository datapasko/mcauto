<template>
    <div class="bg-gray-200 rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105 max-w-80">
        <Link :href="`/cars/${car.id}/show`">
            <div class="relative h-48 overflow-hidden">
                <img 
                    :src="car.src"
                    :alt="car.registration"
                    class="w-full h-full object-cover object-center"
                />
            </div>      


            <div class="p-4">
                <h3 class="text-gray-800 font-semibold mb-1">{{ car.brand + ' ' + car.model }}</h3>
                <h3 class="text-gray-500 font-light overflow-hidden">{{ car.description }}</h3>
                <p class="text-gray-700 font-light text-xs truncate">{{ car.fuel + ' | ' + car.km + ' km' + ' | ' + car.cv + ' CV' + ' | ' + car.year}}</p>
            </div>

            <div class="flexAround gap-3 mx-3 mb-3">
                <div class="border-2 border-primary-700 w-full h-12 rounded-2xl text-center p-1">
                    <p class="text-xs text-gray-400">Precio al contado</p>
                    <p class=" font-semibold text-gray-300">{{ car.price }} €</p>
                </div>

                <div class="bg-yellow-500 w-full h-12 rounded-2xl flex items-center justify-center">
                    <p class="font-semibold">Lo quiero</p>
                </div>
            </div>        
        </Link>
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