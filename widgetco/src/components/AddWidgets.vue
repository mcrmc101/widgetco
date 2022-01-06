<template>
  <div>
    <b-form
      @submit.prevent="addWidgets"
      ref="addForm"
    >
      <b-row align-v="end">
        <b-col>
          <b-form-group
            label-for="winput"
            label="Add Widget Packs:"
          >
            <b-form-input
              id="winput"
              v-model="size"
              type="number"
              placeholder=""
              required
            ></b-form-input>
          </b-form-group>
        </b-col>
        <b-col>
          <b-form-group>
            <b-button
              type="submit"
              variant="success"
            >Save</b-button>
          </b-form-group>
        </b-col>
      </b-row>
    </b-form>
  </div>
</template>
<script>
import axios from 'axios'
export default {
  name: 'AddWidgets',
  data () {
    return {
      size: ''
    }
  },
  methods: {
    addWidgets: function () {
      var data = {
        'size': this.size
      }
      axios.post('http://localhost/kaweb/test/widgetapi/public/api/addWidgets', data)
        .then((res) => {
          console.log(res);
          this.$store.commit('getWidgets')
          this.$refs.addForm.reset()
        })
        .catch((err) => {
          console.log(err)
        })
    },
  }
}
</script>