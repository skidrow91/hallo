import axios from 'axios'

const login = (email, password) => {
  try {
    return axios.post('/api/login', {
      email: email,
      password: password
    })
  } catch (error) {
    console.log(error);
  }
}

export {login}