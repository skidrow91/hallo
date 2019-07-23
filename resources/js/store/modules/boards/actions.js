import {getBoards as fetchBoards} from '../../../api/index'

const getBoards = context => {
  fetchBoards().then(
    response => {
      // console.log(response.data.boards)
      // console.log('test1')
      context.commit('BOARD_UPDATED', response.data.boards)
    }
  ).catch((error) => {
    console.log(error)
  })
}

export default {
  getBoards
};