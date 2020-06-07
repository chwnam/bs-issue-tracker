<template>
  <form ref="form" @submit.prevent="onSubmitForm" action="">
    <p>
      <input type="text" name="title" v-model="title">
    </p>
    <p>
      <textarea name="content" v-model="content"></textarea>
    </p>
    <p>
      <button type="submit">제출하기</button>
    </p>
  </form>
</template>

<script>
export default {
  name: 'IssueForm',
  props: {
    msg: String
  },
  data() {
    return {
      title: '',
      content: ''
    }
  },
  computed: {
    validate() {

    }
  },
  methods: {
    onSubmitForm() {
      if(this.$refs.form.validate){
        // submit 이벤트
      }else {
        return false
      }
    }
  }
}
</script>