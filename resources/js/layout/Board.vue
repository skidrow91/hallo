<template>
	<div class="wrapper">
		<Header />
		<div class="main">
      <b-container>
        <router-view></router-view>
      </b-container>
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