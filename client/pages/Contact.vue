<template>
  <section class="contact">
    <Header />
    <BackgroundHolder :title="title" />
    <v-container>
        <v-card tile>
          <v-col>
          <v-card-title><h3>鈴鹿工業高等専門学校　総務課地域連携係</h3></v-card-title>
          <v-card-text>
            TEL：059-368-1717 (平日8:30~17:00 土日祝日,年末年始除く)<br>
            E-mail：chiiki@jim.suzuka-ct.ac.jp
          </v-card-text>
          </v-col>
        </v-card>
    </v-container>
  </section>
</template>

<script>
import Header from '../components/modules/DefaultHeader'
import BackgroundHolder from '../components/modules/BackgroundHolder'
import Form from '../components/modules/InputForm'
import Contactcontents from '../common/Contactcontents.js'

export default {
  components: {
    Header,
    BackgroundHolder,
    Form
  },
  data () {
    return {
      title: 'Contact',
      contactItems: Contactcontents.contactItems,
      success: false
    }
  },
  methods: {
    submit () {
      this.success = true
    }
  }
}
</script>

<style lang="scss" scoped>
  .v-card{
    margin: 10px;
  }
</style>
