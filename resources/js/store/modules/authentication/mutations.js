const TOKEN_UPDATED = (state, token) => {
  state.token = token
}

const ISLOGIN_UPDATED = (state, status) => {
  state.isLogined = status
}

export default {
  TOKEN_UPDATED,
  ISLOGIN_UPDATED
}