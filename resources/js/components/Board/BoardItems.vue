<template>
  <div class="boardWrapper">
    <b-container>
      <b-row>
        <template v-if="listBoard.length > 0">
          <b-col md="3" v-for="item in listBoard" v-bind:key="item.id">
            <div class="boardWrapper__item" @click="boardDetail(item.id)">
              <h4 class="boardWrapper__itemTitle">{{item.name}}</h4>
            </div>
          </b-col>
        </template>
        <b-col md="3">
          <div class="boardWrapper__item boardWrapper__newItem">
            <h4 class="boardWrapper__itemTitle" @click="isNewBoard = true">Create another board</h4>
            <div v-if="isNewBoard" class="list__item new-item-box">
              <textarea v-model="boardName"></textarea>
              <button type="button" @click="saveBoard">Add</button>
              <button type="button" @click.prevent="closeNewItem">Close</button>
            </div>
          </div>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>

import Header from '../Header.vue'
import {getBoards, updateBoard} from '../../api/index'

export default {
    
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
      this.$router.push({name: 'board_detail', params: {id: id}})
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
    },
    closeNewItem: function () {
      this.isNewBoard = false
      this.boardName = ""
    }
  },
  computed: {
    listBoard: function () {
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

<style lang="scss">
.boardWrapper {
  background: #fafbfc;
  height: 100%;
}
.boardWrapper__item {
	height: 100px;
	border: 1px solid;
	margin-top: 20px;
	cursor: pointer;
	background: rgb(0, 121, 191);
  color: #fff;
  border: 1px;
  border-radius: 3px;
}
.boardWrapper__itemTitle {
  padding: 10px;
  font-size: 15px;
  text-transform: capitalize;
  font-weight: 800;
}

.boardWrapper__newItem {
  cursor: pointer;
  background-color: rgba(9,30,66,.04);
  display: flex;
  align-items: center;

  .boardWrapper__itemTitle {
    color: #000;
    font-weight: 400;
    width: 100%;
    text-align: center;
    vertical-align: middle;
    height: 40px;
    display: table-cell;
  }
}
</style>