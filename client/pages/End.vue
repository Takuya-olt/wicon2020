<template>
  <article class="end">
    <FormHeader />
    <v-container>
      <div class="message">
        ご協力ありがとうございました
      </div>
      <v-row>
        <v-col cols=12 sm=6>
          <v-card to="../map" class="pa-2">
            <v-img
              class="white--text align-end"
              :src="map_image_src"
            >
            </v-img>
            <v-card-title>MAP</v-card-title>
          </v-card>
        </v-col>
        <v-col cols=12 sm=6>
          <v-card to="../ranking" class="pa-2">
            <v-img
              class="white--text align-end"
              :src="ranking_image_src"
            >
            </v-img>
            <v-card-title>RANKING</v-card-title>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </article>
</template>

<script>
import FormHeader from '../components/modules/FormHeader'
export default {
  components: {
    FormHeader
  },
  data(){
    return {
      map_image_src: require('../assets/map-image.png'),
      ranking_image_src: require('../assets/ranking-image.png')
    }
  }
}
</script>

<style scoped>
.message {
  margin: 8vh auto;
  font-size:max(20px, 2vw);
  text-align: center;
}
.bottom-card {
  margin-bottom: 10px;
}
.v-image {
  height: 300px;
}
</style>