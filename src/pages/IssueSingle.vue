<template>
  <div>
    <issue-form 
      v-if="current === 'new'"
      v-bind:categories="categories"
    />
    <issue-form 
      v-else-if="edit"
      :edit=edit
      v-bind:categories="categories"
      v-bind:singleData="data"
    />
    <article v-else>
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
      v-if="!edit"
      v-bind:status="data.status"
    />
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
  props: ["data", "edit", "categories"],
  computed: {
    current: function() {
      return this.$route.params.id
    },
    lastPath: function() {
      let path = this.$route.path.split('/')

      return path[path.length - 1]
    }
  },
  created() {
    EventBus.$emit('createdSingle');
  },
}
</script>