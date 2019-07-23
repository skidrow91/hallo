import axios from 'axios'

const register = (data) => {
  try {
    return axios.post('/api/register', data)
  } catch (error) {
    console.log(error);
  }
}

export {register}