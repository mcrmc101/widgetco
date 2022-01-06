<template>
  <div>
    <b-list-group>
      <b-list-group-item>All Widget Packs:</b-list-group-item>
      <b-list-group-item
        class="d-flex justify-content-between"
        v-for="widget in this.$store.state.widgets"
        :key="widget.id"
      >{{ widget.size }}</b-list-group-item>

    </b-list-group>
    <b-button
      @click="deleteWidgets"
      variant="danger"
      size="sm"
    >Delete</b-button>
  </div>
</template>
<script>
import axios from 'axios'
export default {
  name: 'AllWidgets',
  methods: {
    deleteWidgets: function () {
      axios.post('http://localhost/kaweb/test/widgetapi/public/api/deleteWidgets')
        .then((res) => {
          console.log(res);
        })
        .catch((err) => {
          console.log(err)
        })
    }
  }

}
</script>