<template>
  <div>
    <a href="#" @click.prevent="addNewTask">+ Add another card</a>
    <template v-if="isNewTask">
      <textarea v-model="taskName"></textarea>
      <button type="button" @click="saveTask">Add</button>
      <button type="button" @click="closeTask">Close</button>
    </template>
  </div>
</template>

<script>

import {updateCard} from '../../api/index'

export default {
  data() {
    return {
      // isNewList: false,
      // listName: null,
      // listItems: [],
      // listTasks: [],
      // newTasks: [],
      // test: 'test'
      isNewTask: false,
      taskName: ""
    }
  },
  computed: {
    // list: function () {
    //   return this.listItems
    // }
  },
  props: ['listId'],
  methods: {
    addNewTask () {
      this.isNewTask = true
    },
		saveTask () {
      let cardData = {
        'name': this.taskName,
        'description': "",
        'list_id': this.listId
      }
      updateCard(cardData).then(response => {
        let data = response.data.card
        this.$emit('returnCardBack', data)
        this.isNewTask = false
        this.taskName = ""
      })
    },
    closeTask () {
      this.isNewTask = false
    }
  }
}
</script>