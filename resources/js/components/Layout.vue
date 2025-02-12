<template>
  <div>
    <header class="flex flex-wrap lg:justify-start lg:flex-nowrap z-50 w-full">
      <Navbar/>
    </header>
    <main>
      <slot></slot>
    </main>
    <footer>
      <Footer/>
    </footer>
  </div>
</template>
<script>
import Footer from './Footer.vue';
import Navbar from './Navbar.vue';

export default {
  components: {
    Navbar,
    Footer
  },

  name: 'Layout'
}
</script>