import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    widgets: '',
    result: ''
  },
  mutations: {
    setWidgets (state, value) {
      state.widgets = value
    },
    getWidgets (state) {
      axios.get('http://localhost/kaweb/test/widgetapi/public/api/allWidgets')
        .then((res) => {
          state.widgets = res.data
        })
        .catch((err) => {
          console.log(err)
        })
    },
    calcWidgets (state, value) {
      state.result = value
    }
  },
  actions: {
  },
  modules: {
  }
})
