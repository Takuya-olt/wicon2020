<template>
  <article>
    <Header />
    <BackgroundHolder :title="title"/>
    <v-container >
      <v-row class="flex-column">
        <v-card tile>
          <v-card-title>
            <h3>外来魚の回収量ランキング</h3>
          </v-card-title>
          <v-card-text>
            {{count_period}}の累計回収量が表示されています
            <br>
            最終更新：{{update_time}}
          </v-card-text>
        </v-card>
        <v-card tile class="card-padding">
          <v-simple-table
            fixed-header
            height="30vh"
            class="overflow-y-auto"
          >
            <template v-slot:default>
              <thead>
                <tr>
                  <th>rank</th>
                  <th>name</th>
                  <th>weight [g]</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(items,key) in items" :key="key" class="disable-hover">
                  <td>{{key+1}}</td>
                  <td>{{items.name}}</td>
                  <td>{{items.weight}}</td>
                </tr>
              </tbody>
            </template>
          </v-simple-table>
        </v-card>
      </v-row>
    </v-container>
  </article>
</template>

<script>
import Header from '../components/modules/DefaultHeader'
import BackgroundHolder from '../components/modules/BackgroundHolder'
// import sample from '../common/sample.json'

export default {
  components: {
    Header,
    BackgroundHolder
  },
  data(){
    return{
      title:'Ranking',
      // items: sample,
      items:[],
      update_time: '',
      count_period:'',

      headers:[{
        text:'name',
        value:'name'
      },
      {
        text:'weight',
        value:'weight'
      }
      ]
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

    var that = this
    const RANKING_URL = '/api/ranking.php'
    await this.$axios.$request(RANKING_URL)
      .then(function(response){
        that.items = response
        console.log(response)
      })
      .catch(function(error){
        console.log(error)
      })
  }
}
</script>

<style lang="scss" scoped>
.card-padding {
  padding: 0 10px 10px 10px
}
.v-card {
  margin: 10px;
}
tbody tr:nth-child(odd) td{
  background: linear-gradient(lightcyan, aliceblue);
}
tbody tr:nth-child(even) td{
  background: rgb(250, 250, 250);
}
</style>
