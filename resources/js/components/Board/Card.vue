<template>
  <div>
    <div class="cardBox" 
      @mouseover="isEditableValid = true" 
      @mouseleave="isEditableValid = false"
    >
      {{cardName}}
      <a class="cardEditable" @click.prevent="isOpenEditor = true" v-bind:class="{'cardEditable--open': isEditableValid}" href="#"><font-awesome-icon icon="pen" /></a>
    </div>
    <CardEditable 
      v-if="isOpenEditor" 
      v-out-side="isOpenEditor" 
      v-bind:card-name="cardName"
      v-bind:card-id="cardId" 
      v-on:refreshCard="refreshCard"
      v-on:closeEditable="closeEditable"
    />
  </div>
</template>

<script>

import CardEditable from './CardEditable'
import {updateTask} from '../../api/index'

export default {
  components: {
    CardEditable
  },
  data() {
    return {
      isNewTask: false,
      isEditableValid: false,
      isOpenEditor: false,
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
  props: ['cardName', 'cardId'],
  directives: {
    'out-side': {
      bind: function(el, binding, vNode) {
        const evt = function(event) {
          // console.log(event.target.className)
          // console.log(event.target.nodeName)
          if (binding.value === true && event.target.nodeName != 'path') {
            if (event.target.nodeName != 'SPAN' && event.target.className != 'cardEditor_area' && (typeof event.target.className == 'string' && event.target.className.indexOf('cardEditor__button') == -1)) {
              // console.log(event.target.className)
              // binding.value = false
              vNode.context.isOpenEditor = false
            // console.log(vNode.context.isOpenEditor)
            }
          }
        }
        // console.log(el)
        document.body.addEventListener('click', evt)
      }
    }
  },
  methods: {
    refreshCard () {
      // alert('test')
      this.$emit('refreshCard')
    },
    closeEditable () {
      this.isOpenEditor = false
    }
    // openQuickEditor () {
    //   alert('test');
    // }
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
</style>