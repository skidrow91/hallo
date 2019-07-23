import {getBoards as fetchBoards} from '../../../api/index'

const getBoards = context => {
  fetchBoards().then(
    response => {
      // console.log(response.data.items)
      context.commit('BOARD_UPDATED', response.data.items)
    }
  ).catch((error) => {
    console.log(error)
  })
}

export default {
  getBoards
};