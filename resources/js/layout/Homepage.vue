<template>
	<div class="wrapper">
		<Header />
		<div class="main">
			<b-container>
				<div class="main__login">
					<div class="main__login_title">
						<h1>Log in to Hallo</h1>
						<h3>or create an account</h3>
					</div>
					<b-form>
						<b-form-group>
							<b-col md="12">
								<label>Email (or username) </label>
								<b-form-input class="normal-input" size="sm" placeholder="e.g., dana.scully@fbi.gov"></b-form-input>
							</b-col>
						</b-form-group>

						<b-form-group>
							<b-col md="12">
								<label>Password</label>
								<b-form-input class="normal-input" size="sm" placeholder="e.g., ••••••••••••"></b-form-input>
							</b-col>
						</b-form-group>

						<b-form-group class="center">
							<b-col md="12">
								<b-button class="normal-input-btn input-btn" type="submit" variant="primary">Log In</b-button>
								<!-- <b-button type="reset" variant="danger">Reset</b-button> -->
							</b-col>
						</b-form-group>
					</b-form>
				</div>
			</b-container>
		</div>
	</div>
</template>

<script>

import Header from '../components/Header'

export default {
	name: 'Main',
	components: {
		Header
	}
}
</script>