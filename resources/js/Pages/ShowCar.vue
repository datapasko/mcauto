<script setup>
import { ref, onMounted } from "vue";

defineProps({ car: Object })

console.log(car)

const cars = ref([]);

const getCars = () => {
    let url = `/api/cars/last`;
    axios.get(url).then((response) => {
        cars.value = response.data;
    });
};

onMounted(() => {
    getCars();
});
</script>


<template>
    <div class="h-screen">
        {{ car }} messi

    </div>
</template>

<script>
    export default {
        name: 'ShowCar',        
    }
</script>

<style lang="scss" scoped>

</style>