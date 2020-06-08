<template>
  <form ref="form" @submit.prevent="onSubmitForm" action="">
    <p v-if="failValid"><strong style="color:red">다 입력해야해요!</strong></p>
    <p>
      <label>
        카테고리 선택
        <select name="category" v-model="category">
          <option v-for="item in categories" :key="item">
            {{item}}
          </option>
        </select>
      </label>
    </p>
    <p>
      <label>
        작성자 입력
        <input type="text" name="author" v-model="formValues.author">
      </label>
    </p>
    <p>
      <label>
        타이틀 입력
        <input type="text" name="title" v-model="formValues.title">
      </label>
    </p>
    <p>
      <label>
        내용 입력
        <textarea name="content" v-model="formValues.content"></textarea>
      </label>
    </p>
    <p>
      <button type="submit">제출하기</button>
      <button type="button" @click="onClickGoBack">목록으로 이동</button>
    </p>
  </form>
</template>

<script>
import EventBus from '../EventBus'

export default {
  name: 'IssueForm',
  props: {
    categories: Array
  },
  data() {
    return {
      failValid: false,
      category: '',
      formValues: {
        categories: [],
        author: '',
        title: '',
        content: ''
      },
      createdDate: null,
    }
  },
  computed: {
    validation: function() {
      return {
        category: this.formValues.categories.length,
        author: this.formValues.author.trim(),
        title: this.formValues.title.trim(),
        content: this.formValues.content.trim(),
      }
    },
    isValid: function () {
      const validation = this.validation;
      return Object.keys(validation).every(function(key) {
        return validation[key]
      })
    }
  },
  watch: {
    category() {
      this.formValues.categories = [];
      let arr = this.formValues.categories.concat(this.category)
      this.formValues.categories = arr
    }
  },
  methods: {
    onSubmitForm() {
      if(this.isValid){
        this.createdDate = new Date();

        const formData = {
          "title": this.formValues.title,
          "author": this.formValues.author,
          "date": this.createdDate,
          "content": this.formValues.content,
          "status": "open",
          "categories": this.formValues.categories
        }

        EventBus.$emit('onSubmitForm', formData);

      }else {
        this.failValid = true
      }
    },
    resetForm() {
      this.formValues.category = ''
      this.formValues.author = ''
      this.formValues.title = ''
      this.formValues.content = ''
      this.createdDate = null
    },
    onClickGoBack() {
      this.resetForm()
      this.$router.push('/')
    }
  }
}
</script>