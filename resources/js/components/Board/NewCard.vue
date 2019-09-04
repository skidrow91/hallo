<template>
  <div class="list__newCard" v-bind:class="{'newCard--open': isNewTask}">
    <a v-if="!isNewTask" class="list__newCardButton" href="#" @click.prevent="addNewTask">+ Add another card</a>
    <template v-if="isNewTask">
        <textarea v-model="taskName" class="newCard__name"></textarea>
        <div class="newCard__button">
          <b-button size="sm" variant="success" @click="saveTask">Add Card</b-button>
          <a class="newList__closeNewItem" href="#" @click.prevent="isNewTask = false">Close</a>
        </div>
    </template>
  </div>
</template>

<script>

import {addCard} from '../../api/index'

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
      addCard(cardData).then(response => {
        let data = response.data.card
        this.$emit('returnCardBack', data)
        this.isNewTask = false
        this.taskName = ""
      })
    }
  }
}
</script>

<style lang="scss">
.list__newCard {
  width: 100%;
  position: absolute;
  bottom: 5px;
  left: 0;

  &:not(.newCard--open) {
    &:hover {
      background: rgba(9,30,66,.13);
    }
  }
}
.list__newCardButton {
  color: #6b778c;
  padding: 0 0 0 10px;

  &:hover {
    color: #6b778c;
  }
}
.newCard--open {
  position: unset;
}

.newCard__name {
  width: 100%;
  box-shadow: 0 1px 0 rgba(9, 30, 66, 0.25);
  border-radius: 3px;
  border: unset;
}
</style>