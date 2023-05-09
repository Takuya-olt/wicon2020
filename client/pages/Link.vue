<template>
  <section class="link">
    <Header />
    <BackgroundHolder :title="title" />
    <v-container>
      <v-row class="flex-column">
        <v-card tile>
          <v-card-title>
            <h3 />
          </v-card-title>
          <v-card-text>
            滋賀県庁HP
            <br>
            <a href="https://www.pref.shiga.lg.jp/">https://www.pref.shiga.lg.jp/</a>
          </v-card-text>
        </v-card>
        <v-card tile>
          <v-card-title>
            <h3 />
          </v-card-title>
          <v-card-text>
            鈴鹿工業高等専門学校HP
            <br>
            <a href="https://www.suzuka-ct.ac.jp/">https://www.suzuka-ct.ac.jp/</a>
          </v-card-text>
        </v-card>
      </v-row>
    </v-container>
  </section>
</template>

<script>
import Header from '../components/modules/DefaultHeader'
import BackgroundHolder from '../components/modules/BackgroundHolder.vue'

export default {
  components: {
    Header,
    BackgroundHolder
  },
  data () {
    return {
      title: 'Link'
    }
  }
}
</script>

<style lang="scss" scoped>
  .v-card{
    margin: 10px;
  }
</style>
