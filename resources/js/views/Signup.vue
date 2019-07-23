<template>
	<div class="main">
		<b-container>
			<div class="main__login">
				<div class="main__login_title text-left">
					<h1>Create a Hallo Account</h1>
					<router-link to="/login">or sign in to your account</router-link>
				</div>
				<b-form @submit.prevent="register">
					<b-form-group>
						<b-col md="12">
							<label>Name </label>
							<b-form-input class="normal-input" name="name" size="sm" placeholder="e.g., Turanga Leela" v-model="name"></b-form-input>
    					</b-col>
					</b-form-group>

					<b-form-group>
						<b-col md="12">
      				<label>Email </label>
							<b-form-input type="email" class="normal-input" name="email" size="sm" placeholder="e.g., leela@planetexpress.nnyc" v-model="email"></b-form-input>
    				</b-col>
					</b-form-group>

					<b-form-group>
						<b-col md="12">
      				<label>Password</label>
							<b-form-input type="password" class="normal-input" name="password" size="sm" placeholder="e.g., ••••••••••••" v-model="password"></b-form-input>
    				</b-col>
					</b-form-group>

					<b-form-group>
						<b-col md="12">
      				<label>Password Confirmation</label>
							<b-form-input type="password" class="normal-input" name="password_confirmation" size="sm" placeholder="e.g., ••••••••••••" v-model="password_confirmation"></b-form-input>
    				</b-col>
					</b-form-group>

					<b-form-group class="center">
						<b-col md="12">
							<b-button class="large-input-btn input-btn" type="submit" variant="primary">Create New Account</b-button>
						</b-col>
					</b-form-group>
    		</b-form>
			</div>
		</b-container>
	</div>
</template>

<script>
import {register} from "../api/register"

export default {
	name: 'Signup',
	data() {
		return {
			name: '',
			email: '',
			password: '',
			password_confirmation: ''
		}
  },
  methods: {
    register: function() {
      var data = {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation
      }
      register(data).then(response => {
        console.log(response)
      })
      // alert('test');
    }
  }
}
</script>