import actions from './actions'
import getters from './getters'
import mutations from './mutations'

const state = {
  token: null,
  name: null,
  email: null,
  isLogined: false
}

export default {
  namespaced: true,
  state,
  actions,
  getters,
  mutations
}