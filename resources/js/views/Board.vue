<template>
	<div class="wrapper">
		<Header />
		<div class="main">
			<b-container>
				<b-row>
          <template v-if="this.$store.state.boards.boards">
            <b-col md="3" v-for="item in this.$store.state.boards.boards" v-bind:key="item.id">
              <div class="box" @click="boardDetail(item.id)">
                <h4>{{item.name}}</h4>
              </div>
					  </b-col>
          </template>
          <b-col md="3">
						<div class="box">
							<h4 @click="addNewBoard">+ Add another board</h4>
              <div v-if="isNewBoard" class="list__item new-item-box">
                <textarea v-model="board"></textarea>
                <button type="button" @click="saveBoard">Add</button>
                <!-- <a href="#" @click.prevent="closeNewItemBox">Close</a> -->
							</div>
						</div>
					</b-col>
				</b-row>
			</b-container>
		</div>
	</div>
</template>

<script>

import Header from '../components/Header.vue'
import {getBoards} from '../api/index'

export default {
	name: 'Board',
	components: {
		Header
  },
  data() {
    return {
      isNewBoard: false,
      board: null
    }
  },
	methods: {
		boardDetail: function (id) {
      // alert('test');
      // getBoards();
			// this.$router.push({ name: 'board_detail', params: {boardId: id}});
			// console.log(this.$store.state.boards.boards);
			getBoards().then(response => {
				console.log(response.data.items);
			})
    },
    addNewBoard: function () {
      this.isNewBoard = true
    },
    saveBoard: function () {

    }
  },
  mounted() {
    //this.$store.dispatch('boards/getBoards')
  }
}
</script>