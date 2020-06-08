<template>
  <div>
    <issue-navigator 
      v-bind:tabs="tabs" 
      v-bind:openIssueCount="openIssueCount"
      v-bind:closeIssueCount="closeIssueCount"
    />
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Created Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <issue-items v-bind:data="data" v-bind:visibleItem="selectedTab" />
    </table>
  </div>
</template>

<script>

import EventBus from '../EventBus'

import IssueNavigator from '../components/IssueNavigator'
import IssueItems from '../components/IssueItems'

export default {
  name: 'IssueList',
  components: {
    IssueNavigator,
    IssueItems
  },
  props: {
    data: Array,
    openIssueCount: Number,
    closeIssueCount: Number,
  },
  data() {
    return {
      tabs: ['open', 'close'],
      selectedTab: null
    }
  },
  created() {
    this.selectedTab = this.tabs[0]

    EventBus.$on('onClickTab', tab => {
        this.selectedTab = tab
    })
  },
}
</script>