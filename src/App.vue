<template>
  <div id="app">
    <issue-detail v-if="viewDetail" />
    <issue-list 
      v-else 
      v-bind:data="issueList" 
      v-bind:openIssueCount="openIssueCount"
      v-bind:closeIssueCount="closeIssueCount"
    />
  </div>
</template>

<script>
//Models
import IssueListModel from './Models/IssueListModel';

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
      issueList: [],
      viewDetail : false,
      openIssueCount: null,
      closeIssueCount: null
    }
  },
  created() {
    this.IssueListFetch()
    this.IssueCountFetch()
  },
  methods: {
    IssueListFetch() {
      IssueListModel.list().then(data => {
        this.issueList = data
      })
    },
    IssueCountFetch() {
      IssueListModel.list().then(data => {
        let open = 0;
        let close = 0;

        data.forEach(el => {
          el.status === 'open' ? open++ : close++
        });

        this.openIssueCount = open
        this.closeIssueCount = close
      })
    },
  },
}
</script>
