<template>
<div>
  <l-map :zoom=10 :center=[35.2,136.05] id="map">
    <l-tile-layer :url="url">
    </l-tile-layer>
    <div v-for="(marker, key) in items" :key="key">
      <l-marker :lat-lng="marker.latlng">
        <l-tooltip :content="marker.content"></l-tooltip>
      </l-marker>
    </div>
  </l-map>
</div>
</template>

<script>
import locationData from '../../common/Locationdata.json'

// local用
// import collectData from '../../common/data.json'

export default {
  data:function() {
    return {
      items: [],
      url:'https://{s}.tile.osm.org/{z}/{x}/{y}.png',
      locationData: locationData,
      json: [],
      // local用
      // json: collectData,
    }
  },
  mounted: async function(){
    var that = this
    const JSON_URL = '/api/mapData.php'
    await this.$axios.$request(JSON_URL)
      .then(function(response){
        that.json = response
        console.log(that.json)
      })
      .catch(function(error){
        console.log(error)
      })

    // --------------------
    // merge
    // --------------------
    for(let i=0;i<4;i++){
      let weight = this.json[i].weight
      console.log(weight)

      if(weight==null){
        weight = 0
      }

      var content = this.locationData[i].location + ": " + String(weight) + "g"
      var addData = {"latlng":this.locationData[i].latlng, "content":content}
      this.items.push(addData)
    }
  }
}
</script>

<style lang="scss" scoped>
#map {
  width: auto;
  height: 40vh;
  z-index: 0;
  margin-left: auto;
  margin-right: auto;
}
</style>