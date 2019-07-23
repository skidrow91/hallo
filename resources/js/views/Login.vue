<template>
	<div class="main">
		<b-container>
			<div class="main__login">
				<div class="main__login_title text-left">
					<h1>Log in to Hallo</h1>
					<router-link to="/signup">or create an account</router-link>
				</div>
				<b-form @submit.prevent="login">
					<b-form-group>
						<b-col md="12">
      				<label>Email (or username) </label>
							<b-form-input type="email" name="email" v-validate="'required|email'" class="normal-input" size="sm" placeholder="e.g., dana.scully@fbi.gov" v-model="email"></b-form-input>
              <i v-show="errors.has('email')" class="fa fa-warning"></i>
              <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>
    				</b-col>
					</b-form-group>

					<b-form-group>
						<b-col md="12">
      				<label>Password</label>
							<b-form-input type="password" name="password" class="normal-input" size="sm" placeholder="e.g., ••••••••••••" v-model="password"></b-form-input>
    				</b-col>
					</b-form-group>

					<b-form-group class="center">
						<b-col md="12">
							<b-button class="large-input-btn input-btn" type="submit" variant="primary">Log In</b-button>
							<!-- <b-button type="reset" variant="danger">Reset</b-button> -->
						</b-col>
					</b-form-group>
    		</b-form>
			</div>
		</b-container>
	</div>
</template>

<script>
import {login} from '../api/login'

export default {
  name: 'Login',
  data () {
    return {
      email: "",
      password: ""
    }
  },
  methods: {
    login: function() {
      this.$validator.validate().then(valid => {
        if (valid) {
          login(this.email, this.password).then(
            response => {
              // alert('test');
              if (response.hasOwnProperty('data')) {
                // console.log(response.data.access_token);
                this.$store.dispatch('authentication/setToken', response.data.access_token)
                this.$store.dispatch('authentication/updatelogin', true)
                this.$router.push({path: '/board'})
                // console.log(this.$store.state.authentication);
                // console.log(this.$store.getters['authentication/token'])
              }
            }
          )
        }
      })
    }
  }
}
</script>