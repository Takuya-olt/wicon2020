<template>
  <section class="download">
    <Header />
    <BackgroundHolder :title="title" />
    <v-container>
      <v-col>
        <v-card tile>
          <v-card-title><h3>回収データ置き場</h3></v-card-title>
          <v-card-text>
            外来魚の回収量をcsvファイルで提供しています。
          </v-card-text>
          <v-btn @click="download_all()">download</v-btn>
        </v-card>
      </v-col>
      <v-col>
        <v-card tile>
          <v-card-title><h3>個人のつり上げ量データ</h3></v-card-title>
          <v-card-text>
            ニックネームを入力してDOWNLOADボタンをクリックしてください。過去のつり上げ量をご確認いただけます。
          </v-card-text>
          <v-text-field label="name" v-model="user_name"/>
          <v-btn @click="download_indiv()">download</v-btn>
        </v-card>
      </v-col>
    </v-container>
  </section>
</template>

<script>
import Header from '../components/modules/DefaultHeader'
import BackgroundHolder from '../components/modules/BackgroundHolder'

export default {
  name: 'download',
  components: {
    Header,
    BackgroundHolder
  },
  data: function(){
    return {
      title: 'Download',
      success: false,
      text: 'sampleText',
      user_name: ''
    }
  },
  methods: {
    download_all: async function(){
      const url = '/api/csv.php'
      await this.$axios.$get(url, {
        responseType: 'blob'
      })
        .then(function(response){
          const url = window.URL.createObjectURL(new Blob([response]))
          const link = document.createElement('a')
          link.href = url
          link.setAttribute('download', 'allData.csv')
          document.body.appendChild(link)
          link.click()
          // オブジェクトURLを解放
          window.URL.revokeObjectURL(url)
          document.body.removeChild(link)
        })
        .catch(function(error){
          console.log(error)
        })
    },
    download_indiv: async function(){
      const url = '/api/indiv.php'
      await this.$axios.$post(url, {
        responseType: 'brob',
        user_name: this.user_name
      })
        .then(function(response){
          // console.log(response)

          const url = window.URL.createObjectURL(new Blob([response]))
          const link = document.createElement('a')
          link.href = url
          link.setAttribute('download', 'indiv.csv')
          document.body.appendChild(link)
          link.click()
          // オブジェクトURLを解放
          window.URL.revokeObjectURL(url)
          document.body.removeChild(link)
        })
        .catch(function(error){
          console.log(error)
        })
    }
  }
}
</script>

<style lang="scss" scoped>
  .v-card{
    margin: 10px;
    padding: 10px;
  }
</style>
