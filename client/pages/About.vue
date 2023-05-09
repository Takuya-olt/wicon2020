<template>
  <article class="about">
    <Header />
    <BackgroundHolder :title="title" />
    <v-container>
      <v-row class="flex-column">
        <!--当サイトについて-->
        <v-card tile>
          <v-card-title>
            <h3>当サイトについて</h3>
          </v-card-title>
          <v-card-text>
            <!-- 当サイトは滋賀県の外来魚回収状況を提供するために、高専生が開発・開設したものです。<br> -->
            本取り組みは、総務省主催 高専ワイヤレスIoTコンテスト採択に係る琵琶湖の生態系保護のための外来魚スマート回収ボックスシステム技術実証を
            滋賀県と連携で鈴鹿高専が取り組んでいます。
          </v-card-text>
        </v-card>

        <!--Javascriptについて-->
        <v-card tile>
          <v-card-title>
            <h3>Javascriptについて</h3>
          </v-card-title>
          <v-card-text>
            当サイトはJavascriptを使用しております。Javascriptを無効にした場合、正常に動作しない可能性があります。
          </v-card-text>
        </v-card>
      </v-row>
    </v-container>
  </article>
</template>

<script>
import Header from '../components/modules/DefaultHeader'
import BackgroundHolder from '../components/modules/BackgroundHolder'

export default {
  components: {
    Header,
    BackgroundHolder
  },
  data () {
    return {
      title: 'About'
    }
  }
}
</script>

<style scoped>
  .v-card{
    margin: 10px;
  }
</style>
