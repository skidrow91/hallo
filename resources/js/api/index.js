import axios from 'axios'

const header = "Bearer "+localStorage.getItem('access_token')

const getBoards = () => {
  try {
    return axios.get('/api/boards', {headers: {Authorization: header}})
  } catch (error) {
    console.log(Error)
  }
}

const updateBoard = (boardName) => {
  try {
    return axios.post('/api/boards', {name: boardName}, {headers: {Authorization: header}})
  } catch (error) {
    console.log(error)
  }
}

const getLists = () => {

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

export {getBoards, getLists, getListItems, updateListItem, updateBoard}