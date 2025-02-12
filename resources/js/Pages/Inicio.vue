<template>
  <div class="bg-zinc-50"> 
    <hero id="start"/>

    <features/>

    <buy-car id="buy-car"/>

    <news id="last-car"/>

    <video-section/>

    <section  id="services">
      <services/>
    </section>

    <testimonials/>

    <section  id="contact">
      <contact></contact>
    </section>
  </div>
</template>
  
<script>
  import Hero from '../Sections/Hero.vue'
  import LastCars from '../Sections/LastCars.vue'
  import News from '../Sections/News.vue'
  import Services from '../Sections/Services.vue';
  import BuyCar from '../Sections/BuyCar.vue';
  import Features from '../Sections/Features.vue';
  import Testimonials from '../Sections/Testimonials.vue';
  import Contact from '../Sections/Contact.vue';
  import VideoSection from '../Sections/VideoSection.vue';
  export default {

    name: 'Inicio',
    
    components: {
      Hero,
      LastCars,
      News,
      Services,
      BuyCar,
      Features,
      Testimonials,
      Contact,
      VideoSection
    },
  }
        
</script>