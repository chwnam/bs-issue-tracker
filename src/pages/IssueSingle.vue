<template>
  <div>
    {{current}}
    <article v-if="current === 'new'">
      에디터 환경
      <issue-form 
        v-bind:categories="categories"
      />
    </article>
    <template v-else>
      <article>
        <h2>{{data.title}}</h2>
        <dl>
          <dt>작성자</dt>
          <dd>{{data.author}}</dd>

          <dt>생성일</dt>
          <dd>{{data.date}}</dd>

          <dt>수정일</dt>
          <dd>{{data.modified}}</dd>

          <dt>이슈 종류</dt>
          <dd 
            v-for="item in data.categories" 
            :key="item"
          >
            {{item}}
          </dd>

          <dt>상태</dt>
          <dd>{{data.status}}</dd>
        </dl>
        <div id="content" v-html="data.content">
          <!-- content. Do Not Insert Anything -->
        </div>
      </article>

      <issue-single-aside 
        v-bind:status="data.status"
      />
    </template>
  </div>
</template>

<script>
import EventBus from '../EventBus'

import IssueSingleAside from '../components/IssueSingleAside'
import IssueForm from '../components/IssueForm'

export default {
  name: 'IssueSingle',
  components: {
    IssueSingleAside,
    IssueForm
  },
  props: ["data", "editorial", "categories"],
  computed: {
    current: function() {
      return this.$route.params.id
    }
  },
  created() {
    EventBus.$emit('createdSingle');
  },
}
</script>