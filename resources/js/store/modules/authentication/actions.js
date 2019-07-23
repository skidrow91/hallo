// const getToken = () => {
//   // localStorage.setItem('token', token)
//   let token = localStorage.getItem('token');
//   return token ? token : false
// }

const setToken = (context, token) => {
  context.commit('TOKEN_UPDATED', token)
  localStorage.setItem('access_token', token);
}

const updatelogin = (context, status) => {
  context.commit('ISLOGIN_UPDATED', status)
}

export default {
  setToken,
  updatelogin
}