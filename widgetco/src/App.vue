<template>
  <div id="app">
    <b-navbar
      variant="dark"
      type="dark"
    >
      <b-navbar-brand
        tag="h1"
        class="ms-3"
      >Wallys Widgets</b-navbar-brand>
    </b-navbar>
    <b-container
      class="p-3"
      fluid
    >
      <b-card no-body>
        <b-row
          align-v="center"
          class="m-3"
        >
          <b-col md="6">
            <b-card bg-variant="light">
              <calc-widgets></calc-widgets>
            </b-card>
          </b-col>
          <b-col md="6">
            <b-card bg-variant="light">
              <calc-result></calc-result>
            </b-card>
          </b-col>
        </b-row>
      </b-card>
      <b-card no-body>
        <b-row
          align-v="center"
          class="m-3"
        >
          <b-col md="6">
            <b-card bg-variant="light">
              <add-widgets></add-widgets>
            </b-card>
          </b-col>
          <b-col md="6">
            <b-card bg-variant="light">
              <all-widgets></all-widgets>
            </b-card>
          </b-col>
        </b-row>
      </b-card>
    </b-container>
  </div>
</template>

<script>
import axios from 'axios'
import AddWidgets from './components/AddWidgets.vue'
import AllWidgets from './components/AllWidgets.vue'
import CalcWidgets from './components/CalcWidgets.vue'
import CalcResult from './components/CalcResult.vue'
export default {
  name: 'App',
  components: {
    AddWidgets,
    AllWidgets,
    CalcWidgets,
    CalcResult
  },
  created () {
    this.getWidgets()
  },
  methods: {
    getWidgets: function () {
      axios.get('http://localhost/kaweb/test/widgetapi/public/api/allWidgets')
        .then((res) => {
          // console.log(res.data)
          this.$store.commit('setWidgets', res.data)
        })
        .catch((err) => {
          console.log(err)
        })
    }
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
