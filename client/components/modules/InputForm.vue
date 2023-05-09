<template>
  <v-text-field
    v-model="setText"
    :label="label"
    :placeholder="placeholder"
    class="fieldsize"
  />
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      required: true
    },
    placeholder: {
      type: String,
      required: true
    },
    setText: {
      get () {
        return this.$store.getter.message
      }
    }
  }
}
</script>

<style scoped>
</style>
