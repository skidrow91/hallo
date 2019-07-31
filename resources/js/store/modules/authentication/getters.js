const token = state => {
  // localStorage.setItem('token', token)
  // console.log(state)
  // console.log(localStorage.getItem('access_token'))
  return state.token ? state.token : localStorage.getItem('access_token')
  // return state.token
}

const isLogined = state => {
  return state.isLogined
}

export default {
  token,
  isLogined
}