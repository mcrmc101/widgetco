<template>
  <div>
    <b-list-group>
      <b-list-group-item>All Widget Packs:</b-list-group-item>
      <b-list-group-item
        class="d-flex justify-content-between align-items-center"
        v-for="widget in this.$store.state.widgets"
        :key="widget.id"
      >{{ widget.size }}</b-list-group-item>

    </b-list-group>
  </div>
</template>
<script>
export default {
  name: 'AllWidgets',

}
</script>