<template>
  <div class="quickCardEditor">
    <div class="quickCardEditor__block">
      <textarea class="cardEditor_area"></textarea>
      <div class="cardEditor__block">
        <b-button size="sm" variant="success" class="cardEditor__button" @click="save">Save</b-button>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  data() {
    return {
      
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
  methods: {
    save () {

    }
  }
}
</script>

<style lang="scss">
.cardBox {
  padding: 5px 10px;
  margin-bottom: 8px;
  background: #fff;
  box-shadow: 0 1px 0 rgba(9,30,66,.25);
  border-radius: 3px;
  cursor: pointer;
  position: relative;
}

.cardEditable {
  color: #dfe1e6;
  position: absolute;
  right: 10px;
  display: none; 
}

.cardEditable--open {
  display: unset;
}

.quickCardEditor {
  position: fixed;
  background: rgba(0,0,0,.6);
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 10;

  .quickCardEditor__block {
    position: absolute;
    top: 40%;
    left: 40%;
    width: 50%;
  }
}
.cardEditor_area {
  width: 40%;
  height: 100px;
  /* border: unset; */
  border-radius: 4px;
}
</style>