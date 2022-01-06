import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    widgets: ''
  },
  mutations: {
    setWidgets (state, value) {
      state.widgets = value
    },
    addWidgets (state) {
      axios.get('http://localhost/kaweb/test/widgetapi/public/api/allWidgets')
        .then((res) => {
          state.widgets = res.data
        })
        .catch((err) => {
          console.log(err)
        })
    }
  },
  actions: {
  },
  modules: {
  }
})
