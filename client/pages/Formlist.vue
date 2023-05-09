<template>
  <section>
    <Header />
    <BackgroundHolder :title="title" />
    <nav>
      <!-- <h1>iOS</h1>
      <ul>
        <li><div><router-link to="/Form">form</router-link></div></li>
      </ul> -->
      <h1>WebBluetooth</h1>
      <ul>
          <li><div><router-link to="/bleform/donogawa_ugan">堂の川右岸</router-link></div></li>
          <li><div><router-link to="/bleform/soumongawa_kita">総門川北</router-link></div></li>
          <li><div><router-link to="/bleform/soumongawa_minami">総門川南</router-link></div></li>
          <li><div><router-link to="/bleform/otsu_princehotel_mae">大津プリンスホテル</router-link></div></li>
          <!-- <li><div><router-link to="/bleform/no5">box5</router-link></div></li> -->
          <li><div><router-link to="/form_ble">test</router-link></div></li>
      </ul>
    </nav>
  </section>
</template>

<script>
import Header from '../components/modules/DefaultHeader'
export default {
  components: {
    Header
  },
  data() {
    return {
      title:'Formlist'
    }
  },
  scrollBehavior () {
    return {
      x: 0, y: 0
    }
  }
}
</script>

<style lang="scss" scoped>
  .big{
      padding-bottom :50px;
  }
</style>
