<template>
	<div class="wrapper">
		<Header />
		<div class="main">
			<b-container>
				<b-row>
          <template v-if="listBoard.length > 0">
            <b-col md="3" v-for="item in listBoard" v-bind:key="item.id">
              <div class="box" @click="boardDetail(item.id)">
                <h4>{{item.name}}</h4>
              </div>
					  </b-col>
          </template>
          <b-col md="3">
						<div class="box">
							<h4 @click="addNewBoard">+ Add another board</h4>
              <div v-if="isNewBoard" class="list__item new-item-box">
                <textarea v-model="boardName"></textarea>
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
import {getBoards, updateBoard} from '../api/index'

export default {
	name: 'Board',
	components: {
		Header
  },
  data() {
    return {
      isNewBoard: false,
      boardName: null,
      boardItems: []
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
      if (this.boardName.length > 0) {
        let self = this
        updateBoard(this.boardName).then(response => {
          self.boardName = null
          self.isNewBoard = false
          self.boardItems.push(response.data.boards)
        })
      }
    }
  },
  computed: {
    listBoard: function () {
      // let self = this
      // console.log(this.boardItems)
      return this.boardItems
    }
  },
  mounted() {
    let self = this
    getBoards().then(response => {
      self.boardItems = response.data.boards
      // console.log(response.data.boards)
    })
    // this.$store.dispatch('boards/getBoards')
    // console.log(this.$store.getters['boards/boards'])
    // console.log(this.$store.state.boards)
  }
}
</script>