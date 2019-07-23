<template>
	<div class="wrapper">
		<Header />
		<div class="main">
			<b-container>
				<b-row>
					<b-col md="4">
						<div class="list">
							<h3>Todo</h3>
							<div class="list__item" v-for="item in getListByBoardId" v-bind:key="item.id">
								<h6>{{item.name}}</h6>
							</div>
							<div class="list__item new-item" @click="newItem">
								<h6>+ Add another card</h6>
							</div>
              <div v-if="addNewItem" class="list__item new-item-box">
                <textarea v-model="objItem.name"></textarea>
                <button type="button" @click="addNewTask">Add</button>
                <a href="#" @click.prevent="closeNewItemBox">Close</a>
							</div>
						</div>
					</b-col>
					<b-col md="4">
						<div class="list">
							<div @click="newList">
								<h3>+ Add another list</h3>
							</div>
							<div v-if="addNewList" class="list__item">
								<textarea></textarea>
								<button type="button">Add List</button>
                <a href="#" @click.prevent="closeNewListBox">Close</a>
							</div>
						</div>
					</b-col>
				</b-row>
			</b-container>
		</div>
	</div>
</template>

<script>

import Header from '../components/Header.vue'
// import {updateListItem, getListItems} from '../api/index'

export default {
	name: 'List',
	components: {
		Header
  },
  data() {
    return {
			isNewItem: false,
			isNewList: false,
			objItem: {
				name: '',
				description: ''
			}
    }
  },
	methods: {
		newItem: function() {
			this.isNewItem = true
			// this.$route.params.boardId
		},
		newList: function() {
			this.isNewList = true
    },
    closeNewItemBox: function() {
      this.isNewItem = false
		},
		closeNewListBox: function() {
			this.isNewList = false
		},
		addNewTask: function() {
			// console.log(this.$store.state.lists.lists);
			// this.$store.state.lists.lists.push({
			// 	id: 7,
			// 	name: this.objItem.name,
			// 	board_id: this.$route.params.boardId
			// });
			// let objItem = {
			// 	name: tas
			// }
			this.objItem.list_id = 1;
			updateListItem(this.objItem);

			// this.$store.state.lists.lists
		},
		resetObjItem: function() {
			this.objItem = {
				name: '',
				description: '',
				list_id: ''
			}
		}
  },
  computed: {
    addNewItem: function() {
      return this.isNewItem
		},
		addNewList: function() {
      return this.isNewList
		},
		getListByBoardId: function() {
			let self = this;
			return this.$store.state.lists.lists.filter(function(item){
				return item.board_id == self.$route.params.boardId
			})
		}
  }
}
</script>