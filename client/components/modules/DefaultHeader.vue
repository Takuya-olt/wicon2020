<template>
  <section>
    <v-app-bar
      app
      color="primary"
      dark
    >
      <v-app-bar-nav-icon @click="drawer = true" />
      <v-toolbar-title>LakeBika</v-toolbar-title>
      <v-tabs
        dark
      >
        <v-tab
          v-for="(menuItem, index) in menuItems"
          :key="index"
          :to="menuItem.url"
        >
          {{ menuItem.name }}
        </v-tab>
      </v-tabs>
    </v-app-bar>

    <v-navigation-drawer
      v-model="drawer"
      fixed
      temporary
    >
      <v-list
        nav
        dense
      >
        <v-list-item-group>
          <v-list-item
            v-for="(menuItem, index) in menuItems"
            :key="index"
            :to="menuItem.url"
          >
            <v-list-item-title>
              {{ menuItem.name }}
            </v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </section>
</template>

<script>
import contents from '../../common/Contents.js'
export default {
  name: 'Header',
  data () {
    return {
      drawer: false,
      menuItems: contents.menuItems
    }
  }
}
</script>

<style lang="scss" scoped>
  .v-toolbar__title {
    overflow: visible !important;
    margin-right: 50px !important;
  }

  .v-app-bar__nav-icon {
    @include display_pc {
      display: none !important;
    }
  }

  .v-tabs {
    display: none;

    @include display_pc {
      display: block !important;
    }
  }
</style>
