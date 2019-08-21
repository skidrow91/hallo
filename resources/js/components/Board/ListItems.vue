<template>
  <div class="listWrapper">
    <b-container>
      <b-row>
        <template v-if="list.length > 0">
          <Item v-for="item in list" v-bind:key="item.id" v-bind:item-name="item.name" v-bind:item-id="item.id" />
        </template>
        <template>
          <b-col md="3">
            <div class="newList" v-bind:class="{'newList--open': isNewList}">
              <h4 v-if="!isNewList" class="newList__title" @click="addNewList">+ Add another list</h4>
              <div v-if="isNewList" class="list__item new-item-box">
                <!-- <textarea v-model="listName"></textarea> -->
                <input v-if="isNewList" v-model="listName" value="" class="newList__name" placeholder="Enter list title..." />
                <div class="newList__button">
                  <!-- <button class="" type="button" @click="saveList">Add</button> -->
                  <b-button size="sm" variant="success" @click="saveList">Add List</b-button>
                  <a class="newList__closeNewItem" href="#" @click.prevent="closeNewList">Close</a>
                </div>
              </div>
            </div>
          </b-col>
        </template>
      </b-row>
    </b-container>
  </div>
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
    },
    closeNewList () {
      this.isNewList = false
      this.listName = ""
    }
  }
}
</script>

<style lang="scss">
.list {
  background: #dfe1e6;
  border: 1px solid;
  padding: 10px 10px 30px;
  border-radius: 3px;
  border-color: transparent;
  position: relative;
}
.newList {
  background: rgba(0,0,0,.12);
  cursor: pointer;
  padding: 5px;
  border-radius: 3px;
}
.newList--open {
  background: #dfe1e6;
}
.newList__title {
  font-size: 14px;
  text-transform: capitalize;
  margin-top: 10px;
  color: hsla(0,0%,100%,.8);
}
.list__item {
	/*border: 1px solid;*/
	padding: 5px;
	/*margin-bottom: 10px;*/
	cursor: pointer;

	&.new-item {
		border: unset;
  }
}

/*.newList__closeNewItem {
}*/

.newList__name {
  width: 100%;
  padding: 5px 10px;
  font-size: 14px;
  box-shadow: inset 0 0 0 2px #0079bf;
  border: none;
}
.newList__button {
  padding: 10px 0;
}
</style>