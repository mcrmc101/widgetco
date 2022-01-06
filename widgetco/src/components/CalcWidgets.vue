<template>
  <div>
    <b-form @submit.prevent="calcWidgets">
      <b-row align-v="end">
        <b-col>
          <b-form-group
            label="Calculate Number of Packs:"
            label-for="calcinput"
          >
            <b-form-input
              id="calcinput"
              v-model="num"
              type="number"
              required
            ></b-form-input>
          </b-form-group>
        </b-col>
        <b-col>
          <b-form-group>
            <b-button
              type="submit"
              variant="success"
            >Calculate</b-button>
          </b-form-group>
        </b-col>
      </b-row>
    </b-form>
  </div>
</template>
<script>
import axios from 'axios'
export default {
  name: 'CalcWidgets',
  data () {
    return {
      num: ''
    }
  },
  methods: {
    calcWidgets: function () {
      var data = {
        'num': this.num
      }
      axios.post('http://localhost/kaweb/test/widgetapi/public/api/addWidgets', data)
        .then((res) => {
          console.log(res)
          //this.$store.commit('calcWidgets',res.data)
        })
        .catch((err) => {
          console.log(err)
        })
    }
  }
}
</script>