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
          <th>Modified Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <issue-item v-bind:data="data" v-bind:visibleItem="selectedTab" />
    </table>
  </div>
</template>

<script>

import EventBus from '../EventBus'

import IssueNavigator from '../components/IssueNavigator'
import IssueItem from '../components/IssueItem'

export default {
  name: 'IssueList',
  components: {
    IssueNavigator,
    IssueItem
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