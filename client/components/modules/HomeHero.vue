<template>
  <section class="home-hero">
    <v-container fluid fill-height class="home-hero__content">
      <v-row>
        <v-col class="home-hero__content-text">
          <p>Welcome to my website.</p>
        </v-col>
      </v-row>
    </v-container>
  </section>
</template>

<style  lang="scss" scoped>
.home-hero__content {
  // background: url("../../assets/home-hero.png");
  background: url("../../assets/home-hero.jpeg");
  background-size: cover;
  background-position:center top;
  width: 100%;
  height: 93vh;

  @include display_pc {
    height: 90vh;
  }

  &-text {
    color: white;
    text-align: center;
    font-size: 28px;
    font-weight: bold;
  }

  @include display_pc {
    font-size: 40px;
  }
}
</style>
