<template>
  <div id="app">
    <issue-detail v-if="viewDetail" />
    <issue-list v-else />
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
      viewDetail : false
      issueList: [],
      openIssueCount: null,
      closeIssueCount: null
    }
  }
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
