<template>
  <article>
    <Header />
    <BackgroundHolder :title="title"/>
    <v-container >
      <v-row class="flex-column">
        <v-card tile class="card-padding">
          <v-card-title>
            <h3>集計マップについて</h3>
          </v-card-title>
          <v-card-text>
            回収ボックスごとに集計したものです。タップすると回収量が表示されます。<br>
            集計期間：{{count_period}}
          </v-card-text>
          <Map class="map"/>
        </v-card>
      </v-row>
      <v-row class="flex-column">
        <v-card tile class="card-padding">
          <v-card-title>
            <h3>これまでの総集計値</h3>
          </v-card-title>
          <v-card-text>
            集計フォームで入力された分のみが集計対象となっています。
          </v-card-text>
          <DataTable />
        </v-card>
      </v-row>
    </v-container>
  </article>
</template>

<script>
import Header from '../components/modules/DefaultHeader'
import BackgroundHolder from '../components/modules/BackgroundHolder'
import Map from '../components/modules/Leafletmap'
import DataTable from '../components/modules/DataTable'

export default {
  components: {
    Header,
    BackgroundHolder,
    Map,
    DataTable
  },
  data(){
    return{
      title:'Map',
      update_time:'',
      count_period:'',
    }
  },
  mounted: async function() {
    const now = new Date()

    let update = new Date(now.getFullYear(), now.getMonth(), now.getDate())
    let y = update.getFullYear()
    let m = ("00" + (update.getMonth()+1)).slice(-2)
    let d = ("00" + (update.getDate())).slice(-2)
    this.update_time = y + '/' + m + '/' + d

    let count_start = new Date(now.getFullYear(), now.getMonth(), 1)
    y = count_start.getFullYear()
    m = ("00" + (count_start.getMonth()+1)).slice(-2)
    d = ("00" + (count_start.getDate())).slice(-2)
    count_start = y + '/' + m + '/' + d

    //翌月の一日前を取得
    var count_end = new Date(now.getFullYear(), now.getMonth() + 1, 0)
    y = count_end.getFullYear()
    m = ("00" + (count_end.getMonth()+1)).slice(-2)
    d = ("00" + (count_end.getDate())).slice(-2)
    count_end = y + '/' + m + '/' + d

    this.count_period = count_start + ' ~ ' + count_end
  }
}
</script>

<style lang="scss" scoped>
.card-padding {
  padding: 0 10px 10px 10px
}
.v-card{
  margin: 10px;
}
</style>
