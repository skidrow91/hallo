<template>
	<div class="header">
		<b-container fluid>
			<b-row>
				<b-col class="logo">
					<h4><router-link to="/">Hallo</router-link></h4>
				</b-col>
				<b-col class="menu-right">
					<ul>
						<template v-if="this.$store.getters['authentication/isLogined'] === false">
							<li><router-link to="/board">Board</router-link></li>
							<li><router-link to="/login">Log In</router-link></li>
							<li class="signup-btn"><router-link to="/signup" class="no-underline">Sign Up</router-link></li>
						</template>
            <template v-else>
							<li><a href="#" @click.prevent="logout">Log Out</a></li>
            </template>
					</ul>
				</b-col>
			</b-row>
		</b-container>
	</div>
</template>

<script>
import {logout} from '../api/authenticate'

export default {
  name: 'Header',
  methods: {
    logout: function() {
      logout(localStorage.getItem('access_token')).then(response => {
        localStorage.removeItem('access_token')
        this.$store.dispatch('authentication/updatelogin', false)
        this.$router.push({path: '/'})
      });
    }
  }
}
</script>

<style lang="scss">
.header {
  background: rgba(0,0,0,.15);
}
</style>