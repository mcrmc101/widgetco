<template>
  <div>
    <b-form
      @submit.prevent="calcWidgets"
      ref="calcform"
    >
      <b-row align-v="end">
        <b-col>
          <b-form-group
            label="Widgets Required:"
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
          <b-form-group
            label="Prefer Widgets or Packs"
            label-for="preferselect"
          >
            <b-form-select
              v-model="prefer"
              plain
              @change="changePrefer"
            >
              <b-form-select-option value="widgets">Widgets</b-form-select-option>
              <b-form-select-option value="packs">Packs</b-form-select-option>
            </b-form-select>
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
      num: 0,
      prefer: 'widgets'
    }
  },
  methods: {
    changePrefer: function () {
      if (this.num > 0) {
        this.calcWidgets()
      }
    },
    calcWidgets: async function () {
      var data = {
        'num': this.num,
        'prefer': this.prefer
      }
      axios.post('http://localhost/kaweb/test/widgetapi/public/api/calcWidgets', data)
        .then((res) => {
          console.log(res.data)
          this.$store.commit('calcWidgets', res.data)
          //this.$refs.calcform.reset()
        })
        .catch((err) => {
          console.log(err)
        })
    }
  }
}
</script>