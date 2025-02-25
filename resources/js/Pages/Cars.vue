<script setup>
import { ref, onMounted } from "vue";

const cars = ref([]);
const pagination = ref({});
const loading = ref(false);

const carOptions = ref(
    [
        'Acura',
        'Alfa Romeo',
        'Aston Martin',
        'Audi',
        'Ariel',
        'Bentley',
        'BMW',
        'Bugatti',
        'Buick',
        'Cadillac',
        'Caterham',
        'Chevrolet',
        'Chery',
        'Chrysler',
        'Citroën',
        'Daewoo',
        'Daihatsu',
        'Dodge',
        'Dongfeng',
        'Ferrari',
        'Fiat',
        'Fisker',
        'Ford',
        'Geely',
        'GMC',
        'Ginetta',
        'Honda',
        'Holden',
        'Hummer',
        'Hyundai',
        'Hyundai Genesis',
        'Infiniti',
        'Isuzu',
        'Jaguar',
        'Jeep',
        'Jowett',
        'Karma',
        'Kia',
        'Koenigsegg',
        'Lada',
        'Lamborghini',
        'Land Rover',
        'Lexus',
        'Lincoln',
        'Lotus',
        'Maserati',
        'Mazda',
        'McLaren',
        'MINI',
        'Mitsubishi',
        'Mitsubishi Fuso',
        'Morgan',
        'Noble',
        'Nissan',
        'Peugeot',
        'Pininfarina',
        'Plymouth',
        'Pontiac',
        'Pagani',
        'RAM',
        'Renault',
        'Rivian',
        'Rover',
        'Saab',
        'Scion',
        'Seat',
        'Sbarro',
        'Spyker',
        'Subaru',
        'Suzuki',
        'Tata',
        'Tesla',
        'Toyota',
        'Vauxhall',
        'Vauxhall Motors',
        'Volkswagen',
        'Volvo',
        'Volvo Cars',
        'Wiesmann',
        'Zhejiang Geely',
        'Zotye',
        'Otro',
    ]
);

const colorOptions = ref ([    
    'Blanco', 
    'Negro', 
    'Azul', 
    'Rojo', 
    'Amarillo', 
    'Verde', 
    'Marron', 
    'Gris', 
    'Naranja',
    'Rosa',
    'Violeta',
    'Otro',
]);

const types = ref ([    
    'Furgoneta', 
    'Coche',
]);

const nextYear = new Date().getFullYear() + 1; // Año siguiente al actual
const years = ref(Array.from({ length: nextYear - 1900 + 1 }, (_, i) => nextYear - i));

const  getCars = (url = `/api/cars/all`) => {
    loading.value = true
    axios.get(url, { params: filters.value }).then((response) => {
        cars.value = response.data.data;
        pagination.value = {
            current_page: response.data.current_page,
            last_page: response.data.last_page,
            prev_page_url: response.data.prev_page_url,
            next_page_url: response.data.next_page_url
        };
    })
    .catch(error => {
        console.error("Error al obtener los vehiculos:", error);
    })
    .finally(() =>{
        loading.value = false;
    });
};

const filters = ref({
    brand: "",
    type: "",
    year: "",
    minPrice: 0,
    maxPrice: 20000,
});

const clearFilter = () => {
    filters.value = {
        brand: "",
        type: "",
        year: "",
        minPrice: 0,
        maxPrice: 20000,
    }
}

onMounted(() => {
    getCars();
});
</script>

<template>
    <div class="bg-neutral-100">
        <div class="max-container pt-[15vh] md:pt-[20vh] pb-8">
            <div class="text-center">
                <h2 class="font-bold text-xl lg:text-3xl dark:text-gray-800 mb-2">
                    <span class="text-primary-500">Coches</span> de segunda mano en
                    <span class="text-primary-500">Barcelona.</span>
                </h2>
                <p class="text-neutral-700">
                    El mejor stock de coches de ocasión en Barcelona.
                </p>
                <p class="text-primary-900 text-lg lg:text-xl font-semibold">
                    ¡Echa un vistazo a los últimos modelos disponibles!
                </p>
            </div>


            <div class="mt-10 flexBetween">
                <div>
                    <h2 class="font-light text-sm dark:text-gray-800">
                        Filtros
                    </h2> 
                </div>  
                
                <div >                        
                    <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="size-5" @click="clearFilter(), getCars()">
                        <path d="M15 15L21 21M21 15L15 21M10 21V14.6627C10 14.4182 10 14.2959 9.97237 14.1808C9.94787 14.0787 9.90747 13.9812 9.85264 13.8917C9.7908 13.7908 9.70432 13.7043 9.53137 13.5314L3.46863 7.46863C3.29568 7.29568 3.2092 7.2092 3.14736 7.10828C3.09253 7.01881 3.05213 6.92127 3.02763 6.81923C3 6.70414 3 6.58185 3 6.33726V4.6C3 4.03995 3 3.75992 3.10899 3.54601C3.20487 3.35785 3.35785 3.20487 3.54601 3.10899C3.75992 3 4.03995 3 4.6 3H19.4C19.9601 3 20.2401 3 20.454 3.10899C20.6422 3.20487 20.7951 3.35785 20.891 3.54601C21 3.75992 21 4.03995 21 4.6V6.33726C21 6.58185 21 6.70414 20.9724 6.81923C20.9479 6.92127 20.9075 7.01881 20.8526 7.10828C20.7908 7.2092 20.7043 7.29568 20.5314 7.46863L17 11" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-5 gap-3 py-4">
                <div>
                    <label for="type" class="block text-xs text-gray-900">Tipo de vehiculo</label>
                    <div class="mt-1">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-primary-600">
                            <select v-model="filters.type" name="type" id="type"
                                class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                @change="getCars()">
                                <option v-for="option in types" :key="option" :value="option">
                                    {{ option }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="brand" class="block text-xs text-gray-900">Marca</label>
                    <div class="mt-1">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-primary-600">
                            <select v-model="filters.brand" name="brand" id="brand"
                                class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                @change="getCars()">
                                <option v-for="option in carOptions" :key="option" :value="option">
                                    {{ option }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>


                <div>
                    <label for="year" class="block text-xs text-gray-900">Año</label>
                    <div class="mt-1">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-primary-600">
                            <select v-model="filters.year" name="year" id="year"
                                class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" @change="getCars()">
                                <option v-for="(option, index) in years" :key="index" :value="option">
                                    {{ option }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>                

                <div>
                    <label for="minPrice" class="block text-xs text-gray-900">Precio minimo - {{ filters.minPrice }} €</label>
                    <div class="mt-1">
                        <div
                            class="flex items-center rounded-md bg-white px-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-primary-600">
                            <input v-model="filters.minPrice" type="range" name="minPrice" id="minPrice" min="0" max="60000" step="100" class="block min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" @change="getCars()"/>
                        </div>
                    </div>
                </div>                           

                <div>
                    <label for="maxPrice" class="block text-xs text-gray-900">Precio maximo - {{ filters.maxPrice }} €</label>
                    <div class="mt-1">
                        <div
                            class="flex items-center rounded-md bg-white px-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-primary-600">
                            <input v-model="filters.maxPrice" type="range" name="maxPrice" id="maxPrice" min="0" max="60000" step="100"  class="block min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" @change="getCars()"/>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-14 sm:justify-center sm:items-center">
                <CarCard v-for="item in cars" :key="item.id" :car="item" />
            </div>

            <div class="flex justify-center mt-6 space-x-2" v-if="cars.length">
                <button 
                @click="getCars(pagination.prev_page_url)" 
                :disabled="!pagination.prev_page_url"
                class="p-3 border rounded-md bg-gray-200 hover:bg-gray-300 disabled:opacity-50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" role="img" aria-labelledby="backAltIconTitle" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" color="#000000" class="size-4"> <title id="backAltIconTitle">Back</title> <path d="M4 12l15-9v18z"/> </svg>
                </button>

                <span class="p-2 border text-sm rounded-md bg-primary-500 text-gray-300">
                    Página {{ pagination.current_page }} de {{ pagination.last_page }}
                </span>

                <button 
                @click="getCars(pagination.next_page_url)" 
                :disabled="!pagination.next_page_url"
                class="p-3 border rounded-md bg-gray-200 hover:bg-gray-300 disabled:opacity-50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" id="next" data-name="Line Color" class="size-4"><path id="primary" d="M17,12,5,21V3Z" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"/></svg>
                </button>
            </div>
        </div>

    </div>
</template>

<script>
import CarCard from "../Sections/Cars/CarCard.vue";

export default {
    name: "News",

    components: {
        CarCard,
    },

    data() {
        return {
            //cars: []
        };
    },

    methods: {},
};
</script>

<style lang="scss" scoped></style>