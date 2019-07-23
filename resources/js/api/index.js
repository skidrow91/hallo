import axios from 'axios'

const getBoards = () => {
  try {
    return axios.get('/api/boards')
  } catch (error) {
    console.log(Error)
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

export {getBoards, getLists, getListItems, updateListItem}