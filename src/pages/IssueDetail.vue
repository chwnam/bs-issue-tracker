<template>
  <div>
    Issue ID :  {{current}}
  </div>
</template>

<script>
export default {
  name: 'IssueDetail',
  data() {
    return {
      
    }
  },
  computed: {
    current: function() {
      return this.$route.params.id
    }
  }
}
</script>