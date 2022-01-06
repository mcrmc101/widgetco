<template>
  <div id="app">
    <b-container>
      <b-row align-v="center">
        <b-col md="6">
          <b-card>
          </b-card>
        </b-col>
        <b-col md="6">
          <b-card>
            <add-widgets></add-widgets>
          </b-card>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import AddWidgets from './components/AddWidgets.vue'


export default {
  name: 'App',
  components: {
    AddWidgets

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
