<template>
	<router-view></router-view>
</template>

<script>

import Main from '../components/Main.vue'
import Footer from '../components/Footer.vue'

export default {
	name: 'App',
	components: {
		Main,
		Footer
  },
  mounted() {
    if (this.$store.getters['authentication/token']) {
      this.$store.dispatch('authentication/updatelogin', true)
    }
  }
}
</script>

<style lang="scss">
@import '../../sass/style.scss'
</style>