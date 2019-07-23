import Vue from 'vue'
import Vuex from 'vuex'

import Boards from './modules/boards'
import Lists from './modules/lists'
import Authentication from './modules/authentication'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    boards: Boards,
    lists: Lists,
    authentication: Authentication
  }
})