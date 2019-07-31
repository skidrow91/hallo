import axios from 'axios'
import store from '../store'

const getBoards = () => {
  try {
    return axios.get('/api/boards', {headers: {Authorization: "Bearer "+store.getters['authentication/token']}})
  } catch (error) {
    console.log(Error)
  }
}

const updateBoard = (boardName) => {
  try {
    return axios.post('/api/boards', {name: boardName}, {headers: {Authorization: "Bearer "+store.getters['authentication/token']}})
  } catch (error) {
    console.log(error)
  }
}

const getLists = (boardId) => {
  try {
    return axios.get('/api/getList', {headers: {Authorization: "Bearer "+store.getters['authentication/token']}, params: {board_id: boardId}})
  } catch (error) {
    console.log(Error)
  }
}

const updateList = (name, boardId) => {
  try {
    return axios.post('/api/lists', {name: name, board_id: boardId}, {headers: {Authorization: "Bearer "+store.getters['authentication/token']}})
  } catch (error) {
    console.log(error)
  }
}

const getListItems = () => {
  try {
    return axios.get('/api/lists')
  } catch (error) {
    console.log(Error)
  }
}

const updateListItem = (objItem) => {
  axios.post('/api/lists', {
    name: objItem.name,
    list_id: objItem.listId,
    assign_to: 'test'
  })
}

export {
  getBoards, 
  getLists, 
  updateList,
  getListItems, 
  updateListItem, 
  updateBoard
}