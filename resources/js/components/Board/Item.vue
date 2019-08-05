<template>
  <b-col md="3">
    <div class="box">
      <h4>{{itemName}}</h4>
      <Card v-for="card in cards" v-bind:key="card.id" v-bind:card-name="card.name" />
      <NewCard v-bind:list-id="itemId" v-on:returnCardBack="updateListCard" />
    </div>
  </b-col>
</template>

<script>

import {getCards} from '../../api/index'
import Card from './Card'
import NewCard from './NewCard'

export default {
  components: {
    Card,
    NewCard
  },
  data() {
    return {
      listCards: []
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
    }
  }
}
</script>