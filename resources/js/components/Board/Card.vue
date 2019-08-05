<template>
  <div class="card-box">{{cardName}}</div>
</template>

<script>

import {updateTask} from '../../api/index'

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
      // taskName: ""
    }
  },
  computed: {
    // list: function () {
    //   return this.listItems
    // }
  },
  mounted() {
    // console.log(this.$route.params.id);
    // let self = this
    // getLists(this.$route.params.id).then(response => {
    //   self.listItems = response.data.list
    //   // console.log(response.data)
    // })
    // this.$store.dispatch('boards/getBoards')
    // console.log(this.$store.getters['boards/boards'])
    // console.log(this.$store.state.boards)
  },
  props: ['cardName'],
  methods: {
    addNewTask () {
      this.isNewTask = true
    },
    closeTask () {
      this.isNewTask = false
    }
  }
}
</script>

<style lang="scss">
  .card-box {
    padding: 5px 10px;
    margin-bottom: 8px;
    background: #fff;
    box-shadow: 0 1px 0 rgba(9,30,66,.25);
    border-radius: 3px;
    cursor: pointer;
  }
</style>