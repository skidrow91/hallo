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
    console.log(error)
  }
}

const updateListItem = (objItem) => {
  axios.post('/api/lists', {
    name: objItem.name,
    list_id: objItem.listId,
    assign_to: 'test'
  })
}

const getCards = (listId) => {
  try {
    return axios.get('/api/getCards', {headers: {Authorization: "Bearer "+store.getters['authentication/token']}, params: {list_id: listId}})
  } catch (error) {
    console.log(error)
  }
}

const addCard = (data) => {
  try {
    return axios.post('/api/tasks', {task_data: data}, {headers: {Authorization: "Bearer "+store.getters['authentication/token']}})
  } catch (error) {
    console.log(error)
  }
}

const updateCard = (data, cardId) => {
  try {
    return axios.put('/api/tasks/'+cardId, {task_data: data}, {headers: {Authorization: "Bearer "+store.getters['authentication/token']}})
  } catch (error) {
    console.log(error)
  }
}

const delCard = (cardId) => {
  try { 
    return axios.delete('/api/tasks/'+cardId, {headers: {Authorization: "Bearer "+store.getters['authentication/token']}}, {})
  } catch (error) {
    console.log(error)
  }
}

export {
  getBoards, 
  getLists, 
  updateList,
  getListItems, 
  updateListItem, 
  updateBoard,
  addCard,
  updateCard,
  getCards,
  delCard
}