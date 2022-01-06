<template>
  <div>
    <b-button
      @click="deleteWidgets"
      variant="danger"
    >Delete</b-button>
    <b-form @submit.prevent="addWidgets">
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
        'num': this.size
      }
      axios.post('http://localhost/kaweb/test/widgetapi/public/api/addWidgets', data)
        .then((res) => {
          console.log(res);
        })
        .catch((err) => {
          console.log(err)
        })
    },
    deleteWidgets: function () {
      axios.post('http://localhost/kaweb/test/widgetapi/public/api/addWidgets')
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