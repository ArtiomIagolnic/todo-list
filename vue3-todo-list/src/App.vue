<template>
  <main>
    <Nav />
    <router-view></router-view>
    <Footer />
  </main>
</template>

<script>
import Nav from './components/main/Nav.vue'
import Footer from './components/Main/Footer.vue'
export default {
  components: {
    Nav,
    Footer
  }
}
</script>
