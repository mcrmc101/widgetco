<template>
  <div>
    <b-list-group>
      <b-list-group-item>Packs to Send:</b-list-group-item>
      <b-list-group-item
        class="d-flex justify-content-between"
        v-for="(res,index) in this.$store.state.result"
        :key="index"
      >{{ res }} x {{ index }}</b-list-group-item>

    </b-list-group>
  </div>
</template>
<script>
export default {
  name: 'CalcResult',
}
</script>