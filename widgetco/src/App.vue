<template>
  <div id="app">
    <add-widgets></add-widgets>
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
