<template>
  <div id="app">
    <issue-list 
      v-if="isHome" 
      v-bind:data="issueListData" 
      v-bind:openIssueCount="openIssueCount"
      v-bind:closeIssueCount="closeIssueCount"
    />
    <issue-single 
      v-else 
      :edit=edit
      v-bind:data="issueSingleData"
      v-bind:categories="issueCategoriesData"
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
      edit: false, // 편집환경인지 아닌지
      issueListData: [],
      issueSingleData: [],
      issueCategoriesData: [],
      openIssueCount: null,
      closeIssueCount: null,
      singleDataIndexlocated: null // 수정, 삭제 기능을 더미를 구현하기 위한 데이터.
    }
  },
  computed: {
    isHome: function() {
      return this.$route.path === '/'
    },
    current: function() {
      return this.$route.params.id
    }
  },
  watch: {
    $route (){
      if(this.current){
        this.IssueSingleFetch(this.current)
      }
    }
  },
  created() {
    this.IssueListFetch()
    this.IssueCategoriesFetch()

    EventBus.$on('createdSingle', () => {
      this.IssueSingleFetch(this.current)
    })
    EventBus.$on('onClickModify', () => {
      this.edit = true
    })
    EventBus.$on('onClickRemove', () => {
      let boolean = confirm('Are You Sure?')

      if(boolean){
        this.issueListData.splice(this.singleDataIndexlocated, 1)
        this.$router.replace('/');
      }
    })
    EventBus.$on('onChangeStatus', (v) => {
      this.issueListData[this.singleDataIndexlocated].status = v
    })
    EventBus.$on('onClickNewIssue', () => {
      this.$router.replace('/new');
    })
    EventBus.$on('onSubmitForm', (formData) => {
      let obj = formData

      if(!obj.id){  // 새로 생성된 게시글에 한해 아이디값 임의로 생성. 이는 백엔드에서 처리할 예정
        obj.id = Date.now()
        let arr = this.issueListData.concat(obj)
        this.issueListData = arr
      }else {
        let arr = this.issueListData;

        let i = 0;
        arr.some(el => {
          if (Number(el.id) === Number(obj.id)) {
            arr.splice(i, 1, obj)
            //arr.splice(i, 0, obj);
            this.issueListData = arr
          }
          i++
        });
        i = 0
      }
      this.edit = false
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
