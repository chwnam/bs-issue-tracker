<template>
  <div id="app">
    <issue-single 
      v-if="current" 
      v-bind:data="issueSingleData"
      v-bind:categories="issueCategoriesData"
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
import IssueCategoriesModel from './Models/IssueCategoriesModel';

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
      editorial: false, // 편집환경인지 아닌지
      issueListData: [],
      issueSingleData: [],
      issueCategoriesData: [],
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
    this.IssueCategoriesFetch()

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
    EventBus.$on('onClickNewIssue', () => {
      this.$router.push('/new');
    })
    EventBus.$on('onSubmitForm', (formData) => {
      let obj = formData
      obj.id = Date.now() // 아이디값 임의로 생성. 이는 백엔드에서 처리할 예정
      let arr = this.issueListData.concat(obj)
      this.issueListData = arr

      alert('새로운 이슈가 추가되었습니다')
      this.$router.push('/');
    })
  },
  
  methods: {
    IssueListFetch() {
      IssueListModel.list().then(data => {
        this.issueListData = data
      })
    },
    IssueCategoriesFetch() {
      IssueCategoriesModel.list().then(data => {
        this.issueCategoriesData = data
      })
    },
    IssueSingleFetch(current) {
      IssueListModel.list().then(() => {
        let i = 0;
        this.issueListData.some(el => {
          if (Number(el.id) === Number(current)) {
            this.issueSingleData = el
            this.singleDataIndexlocated = i
          }
          i++
        });
        i = 0
      });
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
