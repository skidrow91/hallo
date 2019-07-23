import axios from 'axios'

const logout = (token) => {
  const header = "Bearer "+token
  try {
    return axios.get('/api/logout', {
      headers: {Authorization: header}
    })
  } catch (error) {
    console.log(error);
  }
}

export {
  logout
}