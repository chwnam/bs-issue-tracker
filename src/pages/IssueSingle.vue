<template>
  <div>
    <article v-if="data.id">
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
  </div>
</template>

<script>
import EventBus from '../EventBus'

export default {
  name: 'IssueSingle',
  props: ["data"],
  data() {
    return {
      
    }
  },
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