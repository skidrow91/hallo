<template>
  <b-row>
    <template v-if="list.length > 0">
      <b-col md="3" v-for="item in list" v-bind:key="item.id">
        <div class="box">
          <h4>{{item.name}}</h4>
          <div>
            <textarea v-model="listName"></textarea>
            <button type="button" @click="saveList">Add</button>
          </div>
        </div>
      </b-col>
    </template>
    <template>
      <b-col md="3">
        <div class="box">
          <h4 @click="addNewList">+ Add another list</h4>
          <div v-if="isNewList" class="list__item new-item-box">
            <textarea v-model="listName"></textarea>
            <button type="button" @click="saveList">Add</button>
            <!-- <a href="#" @click.prevent="closeNewItemBox">Close</a> -->
          </div>
        </div>
      </b-col>
    </template>
  </b-row>
</template>

<script>

import Header from '../Header.vue'
import {getLists, updateList} from '../../api/index'

export default {
    
	components: {
		Header
  },
  data() {
    return {
      boardId: this.$route.params.id,
      isNewList: false,
      listName: null,
      listItems: []
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
    addNewList: function () {
      this.isNewList = true
    },
    saveList: function () {
      if (this.listName.length > 0) {
        let self = this
        updateList(this.listName, this.boardId).then(response => {
          self.listName = null
          self.isNewList = false
          self.listItems.push(response.data.list)
        })
      }
    }
  },
  computed: {
    list: function () {
      return this.listItems
    }
  },
  mounted() {
    // console.log(this.$route.params.id);
    let self = this
    getLists(this.$route.params.id).then(response => {
      self.listItems = response.data.list
      // console.log(response.data)
    })
    // this.$store.dispatch('boards/getBoards')
    // console.log(this.$store.getters['boards/boards'])
    // console.log(this.$store.state.boards)
  }
}
</script>