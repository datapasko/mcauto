<script setup>
import { ref, onMounted } from "vue";

const cars = ref([]);

onMounted(() => {
  let url = `/api/cars/last`;
  axios.get(url).then((response) => {
      cars.value = response.data;
  });
});

</script>

<template>
  <div class="max-container pt-16 pb-8">
    <div class="text-center">
      <h2 class="font-bold text-xl lg:text-3xl dark:text-gray-800 mb-2">
        Novedades en <span class="text-primary-500">vehículos</span> de segunda
        mano con <span class="text-primary-500">garantía.</span>
      </h2>
      <p class="text-neutral-700">
        Actualizamos nuestro catálogo constantemente para ofrecerte siempre las
        mejores oportunidades.
      </p>
      <p class="text-primary-900 text-lg lg:text-xl font-semibold">
        ¡Echa un vistazo a los últimos modelos disponibles!
      </p>
    </div>

    <div
      class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-14 sm:justify-center sm:items-center"
    >
      <CarCard v-for="item in cars" :key="item.id" :car="item" />
    </div>

    <div class="flexCenter mt-15">
      <Link
        class="bg-yellow-500 gap-x-2 text-lg text-nowrap rounded-xl border border-transparent font-semibold p-3 hover:bg-yellow-600 focus:outline-none focus:bg-yellow-600 transition disabled:opacity-50 disabled:pointer-events-none"
        href="/coches-segunda-mano-barcelona"
      >
        Ver más coches
      </Link>
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
};
</script>

<style lang="scss" scoped></style>