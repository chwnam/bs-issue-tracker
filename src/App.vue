<template>
  <div id="app">
    <issue-detail v-if="viewDetail" />
    <issue-list v-else />
  </div>
</template>

<script>
// Pages
import IssueList from './pages/IssueList'
import IssueDetail from './pages/IssueDetail'

export default {
  name: 'App',
  components: {
    IssueList,
    IssueDetail
  },
  data() {
    return {
      viewDetail : false
    }
  }
}
</script>
