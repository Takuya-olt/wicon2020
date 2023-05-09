<template>
  <component :is="currentHeader"></component>
</template>

<script>
import DefaultHeader from '../../components/modules/DefaultHeader'
import FormHeader from '../../components/modules/FormHeader'

export default {
  props: {
    currentheader: {
      default: 'Default'
    }
  },
  components: {
    Default: DefaultHeader,
    Form: FormHeader
  }
}
</script>