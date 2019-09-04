<template>
  <div class="quickCardEditor">
    <div class="quickCardEditor__block">
      <div class="quickCardEditor__left">
        <textarea class="cardEditor_area" v-model="cardName"></textarea>
        <div class="cardEditor__block">
          <b-button size="sm" variant="success" class="cardEditor__button" @click="save">Save</b-button>
        </div>
      </div>
      <div class="quickCardEditor__right">
        <ul class="quickCardEditor__menu">
          <li><span>Edit Labels</span></li>
          <li><span>Copy</span></li>
          <li><span>Move</span></li>
          <li @click="remove"><span>Remove</span></li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>

import {delCard, updateCard} from '../../api/index'

export default {
  data() {
    return {
      
    }
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
  props: ['cardName', 'cardId'],
  methods: {
    save () {
      if (this.cardName) {
        let data = {
          name: this.cardName
        }
        updateCard(data, this.cardId).then(response => {
          this.$emit('refreshCard')
          this.$emit('closeEditable')  
        })
      }
    },
    remove () {
      // self.$emit('refreshCard')
      delCard(this.cardId).then(response => {
        // console.log(response)
        this.$emit('refreshCard')
      })
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
    top: 20%;
    left: 40%;
    width: 50%;
    display: flex;
    justify-content: flex-start;
    align-content: flex-start;
  }

  .quickCardEditor__left {
    width: 35%;
  }
}

.quickCardEditor__menu {
  list-style: none;
  padding: 0;
  margin: 0 0 0 10px;
  li {
    border: 1px solid;
    padding: 5px 8px 5px 5px;
    margin-bottom: 5px;
    background: #000;
    border-radius: 4px;
    cursor: pointer;
  }
  span {
    color: #fff;
    font-size: 14px;
  }
}

.cardEditor_area {
  width: 100%;
  height: 100px;
  /* border: unset; */
  border-radius: 4px;
}
</style>