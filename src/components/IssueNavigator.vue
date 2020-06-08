<template>
  <ul>
    <li v-for="tab in tabs" :key="tab">
      <button type="button" @click="onClickTab(tab)">
        {{count(tab)}}
        {{tab}}
      </button>
    </li>
    <li>
      <button type="button" @click="onClickNewIssue">New Issue</button>
    </li>
  </ul>
</template>

<script>

import EventBus from '../EventBus'

export default {
  name: 'IssueNavigator',
  props: {
    tabs: Array,
    openIssueCount: Number,
    closeIssueCount: Number,
  },
  computed: {
    
  },
  methods: {
    onClickTab(tab){
      EventBus.$emit('onClickTab', tab);
    },
    onClickNewIssue(){
      EventBus.$emit('onClickNewIssue')
    },
    count(tab) {
      if(tab === 'open'){
        return this.openIssueCount
      }else if (tab === 'close') {
        return this.closeIssueCount
      }
    }
  }
}
</script>