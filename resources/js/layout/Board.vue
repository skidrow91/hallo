<template>
	<div class="wrapper">
		<Header />
		<div class="main">
      <router-view></router-view>
		</div>
	</div>
</template>

<script>

import Header from '../components/Header'
import {getBoards, updateBoard} from '../api/index'

export default {
	components: {
		Header
  }
}
</script>

<style lang="scss">
.wrapper {
	background: rgb(0, 121, 191);
}
.main {
  height: 100vh;
}
</style>