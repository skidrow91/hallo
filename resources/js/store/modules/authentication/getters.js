const token = () => {
  // localStorage.setItem('token', token)
  let token = localStorage.getItem('access_token');
  return token ? token : false
  // return state.token
}

const isLogined = state => {
  return state.isLogined
}

export default {
  token,
  isLogined
}