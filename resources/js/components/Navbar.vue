<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { usePage } from "@inertiajs/vue3";import { router } from '@inertiajs/vue3'

const isOpen = ref(false);
const activeSection = ref("start");
const page = usePage(); // Detecta la página activa
const isScrolled = ref(page.url === "/" ? false : true);

const handleScroll = () => {
  if(page.url === "/")
    isScrolled.value = window.scrollY > 50; // Cambia cuando el usuario baja 50px
  else
    isScrolled.value = true
};

onMounted(() => {
  window.addEventListener("scroll", handleScroll);
});

onUnmounted(() => {
  window.removeEventListener("scroll", handleScroll);
});


// Función para desplazarse a una sección
const scrollToSection = (id) => {  
  activeSection.value = id ? id : '';
  if (page.url === "/") {
    document.getElementById(id)?.scrollIntoView({ behavior: "smooth" });
  } else {
    router.visit('/', { 
      onSuccess: (page) => {
        setTimeout(() => {
          document.getElementById(id)?.scrollIntoView({ behavior: "smooth" });
        }, 500);        
      },
    });
  }
};

const openModal = () => {
  isOpen.value = true
  return isOpen.value
}

</script>

<template>
  <nav
    :class="[
      'fixed w-full  top-0 left-0 transition-all duration-300 ease-in z-50 items-center flex flex-wrap lg:grid lg:grid-cols-12 px-4 md:px-6 lg:px-8 mx-auto basis-full',
      isScrolled ? 'bg-primary-800 text-white py-1 shadow-md' : 'bg-white/20 backdrop-blur-md py-3 text-white'
    ]"
  >

      <div class="lg:col-span-3 flex items-center">
      <!-- Logo -->
      <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80" href="/" aria-label="Preline">        
        <img class="h-20" src="../../img/logo_mcauto.webp" alt="logo mcauto13">
      </a>
      <!-- End Logo -->
    </div>

    <!-- Button Group -->
    <div class="flex items-center gap-x-1 lg:gap-x-2 ms-auto py-1 lg:ps-6 lg:order-3 lg:col-span-3">
      <a type="button" href="https://wa.me/+34696101373" target="_blank" class="p-2 inline-flex items-center gap-x-2 text-sm font-medium text-nowrap rounded-xl bg-green-500  text-black hover:bg-green-800 focus:outline-none focus:bg-green-800 ">
        <svg fill="#000000" height="800px" width="800px" version="1.1" id="Icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
            viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve" class="size-4 fill-white">
          <g id="WA_Logo">
            <g>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5,3.5C18.25,1.25,15.2,0,12,0C5.41,0,0,5.41,0,12c0,2.11,0.65,4.11,1.7,5.92
                L0,24l6.33-1.55C8.08,23.41,10,24,12,24c6.59,0,12-5.41,12-12C24,8.81,22.76,5.76,20.5,3.5z M12,22c-1.78,0-3.48-0.59-5.01-1.49
                l-0.36-0.22l-3.76,0.99l1-3.67l-0.24-0.38C2.64,15.65,2,13.88,2,12C2,6.52,6.52,2,12,2c2.65,0,5.2,1.05,7.08,2.93S22,9.35,22,12
                C22,17.48,17.47,22,12,22z M17.5,14.45c-0.3-0.15-1.77-0.87-2.04-0.97c-0.27-0.1-0.47-0.15-0.67,0.15
                c-0.2,0.3-0.77,0.97-0.95,1.17c-0.17,0.2-0.35,0.22-0.65,0.07c-0.3-0.15-1.26-0.46-2.4-1.48c-0.89-0.79-1.49-1.77-1.66-2.07
                c-0.17-0.3-0.02-0.46,0.13-0.61c0.13-0.13,0.3-0.35,0.45-0.52s0.2-0.3,0.3-0.5c0.1-0.2,0.05-0.37-0.02-0.52
                C9.91,9.02,9.31,7.55,9.06,6.95c-0.24-0.58-0.49-0.5-0.67-0.51C8.22,6.43,8.02,6.43,7.82,6.43S7.3,6.51,7.02,6.8
                C6.75,7.1,5.98,7.83,5.98,9.3c0,1.47,1.07,2.89,1.22,3.09c0.15,0.2,2.11,3.22,5.1,4.51c0.71,0.31,1.27,0.49,1.7,0.63
                c0.72,0.23,1.37,0.2,1.88,0.12c0.57-0.09,1.77-0.72,2.02-1.42c0.25-0.7,0.25-1.3,0.17-1.42C18,14.68,17.8,14.6,17.5,14.45z"/>
            </g>
          </g>
        </svg>
      </a>

      <a type="button" href="tel:696101373" target="_blank" class="p-2 inline-flex items-center gap-x-2 text-sm font-medium text-nowrap rounded-xl bg-white border border-gray-200 text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:hover:bg-white/10 dark:text-white dark:hover:text-white dark:focus:text-white">
        <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="size-4">
          <path d="M3 5.5C3 14.0604 9.93959 21 18.5 21C18.8862 21 19.2691 20.9859 19.6483 20.9581C20.0834 20.9262 20.3009 20.9103 20.499 20.7963C20.663 20.7019 20.8185 20.5345 20.9007 20.364C21 20.1582 21 19.9181 21 19.438V16.6207C21 16.2169 21 16.015 20.9335 15.842C20.8749 15.6891 20.7795 15.553 20.6559 15.4456C20.516 15.324 20.3262 15.255 19.9468 15.117L16.74 13.9509C16.2985 13.7904 16.0777 13.7101 15.8683 13.7237C15.6836 13.7357 15.5059 13.7988 15.3549 13.9058C15.1837 14.0271 15.0629 14.2285 14.8212 14.6314L14 16C11.3501 14.7999 9.2019 12.6489 8 10L9.36863 9.17882C9.77145 8.93713 9.97286 8.81628 10.0942 8.64506C10.2012 8.49408 10.2643 8.31637 10.2763 8.1317C10.2899 7.92227 10.2096 7.70153 10.0491 7.26005L8.88299 4.05321C8.745 3.67376 8.67601 3.48403 8.55442 3.3441C8.44701 3.22049 8.31089 3.12515 8.15802 3.06645C7.98496 3 7.78308 3 7.37932 3H4.56201C4.08188 3 3.84181 3 3.63598 3.09925C3.4655 3.18146 3.29814 3.33701 3.2037 3.50103C3.08968 3.69907 3.07375 3.91662 3.04189 4.35173C3.01413 4.73086 3 5.11378 3 5.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
      <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm text-nowrap rounded-xl border border-transparent bg-yellow-500 text-black hover:bg-yellow-600 focus:outline-none focus:bg-yellow-600 transition disabled:opacity-50 disabled:pointer-events-none" @click="openModal">
        Vender mi coche
      </button>

      <BuyCarModal :open="isOpen" @close="isOpen = !isOpen"></BuyCarModal>

      <div class="lg:hidden">
        <a type="button" class="hs-collapse-toggle size-10 flex justify-center items-center text-sm font-semibold bg-white rounded-xl border border-gray-200 text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="hs-navbar-hcail-collapse" aria-expanded="false" aria-controls="hs-navbar-hcail" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-hcail">
          <svg class="hs-collapse-open:hidden shrink-0 size-4 md:size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
          <svg class="hs-collapse-open:block hidden shrink-0 size-4 md:size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </a>
      </div>
    </div>
    <!-- End Button Group -->

    <!-- Collapse -->
    <div id="hs-navbar-hcail" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow lg:block lg:w-auto lg:basis-auto lg:order-2 lg:col-span-6" aria-labelledby="hs-navbar-hcail-collapse">
      <div class="flex flex-col gap-y-4 gap-x-0 mt-5 lg:flex-row lg:justify-center lg:items-center lg:gap-y-0 lg:gap-x-6 lg:mt-0">
        <div 
          v-for="item in links" 
          :key="item.section">
          <a :class="activeSection === item.section ? class_active : '' " class="inline-block hover:text-primary-600 focus:outline-none focus:text-primary-600 dark:text-white dark:hover:text-neutral-300 dark:focus:text-neutral-300" @click="scrollToSection(item.section)" aria-current="page">
            {{ item.label }}
          </a>
        </div>
      </div>
    </div>
    <!-- End Collapse -->
  </nav>
</template>

<script>

import BuyCarModal from "../Sections/Modals/BuyCarModal.vue";

export default {  

  components: {
      BuyCarModal
  },

  data: () => ({
      links: [
          { label:'Inicio', section: 'start'},
          { label:'Nuestros servicios', section: 'services'},
          { label:'Nuestros vehiculos', section: 'last-car'},
          { label:'Vende tu coche', section: 'buy-car'},
          { label:'Contacto', section: 'contact'},
      ],
      class_active: 'relative focus:outline-none before:absolute before:bottom-0 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-primary-500'
      
  })
}
</script>
