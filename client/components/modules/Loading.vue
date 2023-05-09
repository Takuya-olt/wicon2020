<template>
  <div v-show="loading">
    <div class="fullview">
      <div class="loading">
        <div 
          style="text-align:center"
          class="display-1 font-weight-thin"
          >
          Loading...
        </div>
        <br>
        <v-progress-linear
          indeterminate
          color="blue accent-2"
        >
        </v-progress-linear>
      </div>
    </div>
  </div>
</template>

<script>
import { VueLoading } from 'vue-loading-template'

export default {
  // name: 'loading',
  data:function(){
    return {
      loading:true
    }
  },
  components: {
    VueLoading,
  },
}
</script>

<style>
.fullview {
  width: 100%;
  height: 100%;
  background: #ffffff;
  position: fixed;
  top: 0;
  left: 0;
}
.loading {
  width: 80vw;
  margin: 40vh auto;
}
</style>