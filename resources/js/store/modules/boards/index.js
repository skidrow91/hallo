import actions from './actions'
import getters from './getters'
import mutations from './mutations'

const state = {
  boards: [
    // {
    //   id: 1,
    //   name: 'Test1',
    //   user_id: 12
    // },
    // {
    //   id: 2,
    //   name: 'Test2',
    //   user_id: 12
    // },
    // {
    //   id: 3,
    //   name: 'Test3',
    //   user_id: 12
    // }
  ]
};

export default {
  namespaced: true,
  state,
  actions,
  // getters,
  mutations
}