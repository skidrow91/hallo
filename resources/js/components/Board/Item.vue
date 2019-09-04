<template>
  <b-col md="3">
    <div class="list">
      <h4 class="list__title">{{itemName}}</h4>
        <draggable class="list-group" tag="div" :options='{group: "card"}' v-model="listCards" draggable=".cardBox__wrap" :move="onMove" @start="isDragging=true" @end="isDragging=false">
          <transition-group type="transition">
            <Card v-for="card in listCards" 
                v-bind:key="card.id" 
                v-bind:card-name="card.name" 
                v-bind:card-id="card.id" 
                v-on:refreshCard="refreshCard" 
                class="cardBox__wrap"
            />
          </transition-group>
        </draggable>
        <NewCard v-bind:list-id="itemId" v-on:returnCardBack="updateListCard" />
    </div>
  </b-col>
</template>

<script>

import draggable from 'vuedraggable'
import {getCards} from '../../api/index'
import Card from './Card'
import NewCard from './NewCard'

export default {
  components: {
    draggable,
    Card,
    NewCard
  },
  data() {
    return {
      listCards: [],
      isDragging: false,
    }
  },
  computed: {
    cards: function () {
      return this.listCards
    }
  },
  mounted() {
    let self = this
    getCards(this.itemId).then(response => {
      self.listCards = response.data.cards
    })
  },
  props: ['itemName', 'itemId'],
  methods: {
    addNewTask () {
      this.isNewTask = true
    },
    closeTask () {
      this.isNewTask = false
    },
    updateListCard (cardReturn) {
      this.listCards.push(cardReturn)
    },
    refreshCard () {
      // alert('testdada')
      let self = this
      getCards(this.itemId).then(response => {
        self.listCards = response.data.cards
      })
    },
    // checkMove (evt) {
    //   alert('test')
    // }
    onMove({ relatedContext, draggedContext }) {
      const relatedElement = relatedContext.element;
      const draggedElement = draggedContext.element;
      console.log(draggedElement)
      // return (
      //   (!relatedElement || !relatedElement.fixed) && !draggedElement.fixed
      // );
    }
  },
  watch: {
    // isDragging(newValue) {
    //   console.log(newValue)
    // }
  }
}
</script>

<style lang="scss">
.list__title {
  color: #172b4d;
  font-size: 14px;
  font-weight: 700;
  text-transform: capitalize;
}
</style>