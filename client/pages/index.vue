<template>
  <section class="home">
    <Header />
    <HomeHero />
    <!-- <HomeAbout /> -->
  </section>
</template>

<script>
import Header from '../components/modules/DefaultHeader'
import HomeHero from '../components/modules/HomeHero.vue'
// import HomeAbout from '../components/modules/HomeAbout.vue'

export default {
  components: {
    Header,
    HomeHero
    // HomeAbout
  },
}
</script>

<style lang="scss" scoped>

</style>
