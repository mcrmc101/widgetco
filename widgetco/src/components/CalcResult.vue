<template>
  <div>
    <h1>{{ result }}</h1>
  </div>
</template>
<script>
export default {
  name: 'CalcResult',
  data () {
    return {
      result: this.$store.state.result
    }
  }
}
</script>