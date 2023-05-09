<template>
  <v-app class="overscroll background">
    <v-main>
      <transition mode="out-in">
        <Loading v-show="loading"></Loading>
      </transition>
      <nuxt v-show="!loading" />
      <br>
      <Footer class="footer" v-show="!loading" />
  </v-main>
    </v-app>
</template>

<script>
import Loading from '../components/modules/Loading'
import Footer from '../components/modules/DefaultFooter'
import Header from '../components/modules/DefaultHeader'
export default {
  name:'default',
  data:function(){
    return {
      loading: true
    }
  },
  mounted(){
    setTimeout(() => {
      this.loading = false
    }, 1500)
  },
  components: {
    Loading,
    Footer,
    Header
  }
}
</script>>

<style scoped>
.footer{
  position: fixed;
  bottom: 0;
}
.background{
  background-color: aliceblue;
}
.v-enter-active, .v-leave-active {
  /* opacity 不透明度 */
  transition: opacity 1.0s;
}
.v-enter, .v-leave-to {
  opacity: 0;
}
.overscroll {
  overscroll-behavior: none;
}
</style>
