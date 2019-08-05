<template>
  <b-row>
    <template v-if="list.length > 0">
      <Item v-for="item in list" v-bind:key="item.id" v-bind:item-name="item.name" v-bind:item-id="item.id" />
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

import Header from '../Header'
import Item from './Item'
import {getLists, updateList, getCards} from '../../api/index'

export default { 
	components: {
    Header,
    Item
  },
  data() {
    return {
      boardId: this.$route.params.id,
      isNewList: false,
      listName: null,
      listItems: [],
      listTasks: [],
      newTasks: []
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
  },
  methods: {
    addNewList: function () {
      this.isNewList = true
    },
    addNewTask: function (listId) {
      let data = {
        name: "",
        description: "",
        list_id: listId
      }
      this.newTasks.push(data)
      // console.log(this.newTasks)
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
    },
    saveTask () {
      updateTask(this.newTasks).then(response => {
        console.log(response)
      })
    },
    closeTask(listId) {
      this.newTasks = this.newTasks.filter(elm => elm.list_id != listId)
    },
    isOpenCard: function (listId) {
      if (this.newTasks.length > 0) {
        for (let i=0; i<this.newTasks.length; i++) {
          if (this.newTasks[i].list_id == listId) {
            return true
          }
        }
      }
      return false
    }
  }
}
</script>