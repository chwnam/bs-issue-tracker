<template>
  <div id="app">
    <issue-single 
      v-if="current" 
      v-bind:data="issueSingleData"
    />
    <issue-list 
      v-else 
      v-bind:data="issueListData" 
      v-bind:openIssueCount="openIssueCount"
      v-bind:closeIssueCount="closeIssueCount"
    />
  </div>
</template>

<script>

import router from './routes'
import EventBus from './EventBus'

//Models
import IssueListModel from './Models/IssueListModel';

// Pages
import IssueList from './pages/IssueList'
import IssueSingle from './pages/IssueSingle'

export default {
  router,
  name: 'App',
  components: {
    IssueList,
    IssueSingle
  },
  data() {
    return {
      issueListData: [],
      issueSingleData: [],
      openIssueCount: null,
      closeIssueCount: null,
      singleDataIndexlocated: null // 수정, 삭제 기능을 더미를 구현하기 위한 데이터.
    }
  },
  computed: {
    current: function() {
      return this.$route.params.id
    }
  },
  watch: {
    $route (){
      this.issueSingleData = []
    }
  },
  created() {
    this.IssueListFetch()

    EventBus.$on('createdSingle', () => {
      this.IssueSingleFetch(this.current)
    })
    EventBus.$on('onClickModify', () => {
      console.log('EventBus $on onClickModify')
    })
    EventBus.$on('onClickRemove', () => {
      let boolean = confirm('Are You Sure?')

      if(boolean){
        this.issueListData.splice(this.singleDataIndexlocated, 1)
        this.$router.push('/');
      }
    })
    EventBus.$on('onChangeStatus', (v) => {
      this.issueListData[this.singleDataIndexlocated].status = v
      //console.log(this.issueListData[this.singleDataIndexlocated].status, v)
    })
  },
  
  methods: {
    IssueListFetch() {
      IssueListModel.list().then(data => {
        this.issueListData = data
      })
    },
    IssueSingleFetch(current) {
      IssueListModel.list().then(data => {
        let i = 0;
        data.forEach(el => {
          if (Number(el.id) === Number(current)) {
            this.issueSingleData = data[i];
            this.singleDataIndexlocated = i
          }
          i++
        });
        i = 0
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
