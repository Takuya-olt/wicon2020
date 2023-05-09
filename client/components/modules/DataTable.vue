<template>
  <div>
    <v-simple-table
      fixed-header
      height="30vh"
      class="overflow-y-auto"
    >
      <template v-slot:default>
        <thead>
          <tr>
            <th>location</th>
            <th>weight [g]</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item,key) in items" :key="key" class="disable-hover">
            <td>{{item.location}}</td>
            <td>{{item.weight}}</td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </div>
</template>

<script>
import LocationData from '../../common/Locationdata.json'

export default {
  data(){
    return {
      locationData:LocationData,
      items:[],
    }
  },
  mounted: async function(){  
    var that = this
    const ITEM_URL = '/api/mapData.php'
    await this.$axios.$get(ITEM_URL)
      .then(function(response){
        const json = response
        for(let i=0;i<4;i++){
          // nullの処理
          let weight = json[i].weight
          if(weight==null){
            weight = 0
          }
          // データのマージ
          var addData = {"location":that.locationData[i].location, "weight":weight}
          that.items.push(addData)
        }
      })
      .catch(function(error){
        console.log(error)
      })
  }
}
</script>
