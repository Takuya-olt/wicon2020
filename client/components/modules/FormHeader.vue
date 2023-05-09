<template>
  <header>
    <v-app-bar
      app
      color="primary"
      dark
    >
      <v-toolbar-title>
        <!-- 滋賀県 -->
        外来魚集計フォーム
      </v-toolbar-title>
    </v-app-bar>
  </header>
</template>

<script>

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
