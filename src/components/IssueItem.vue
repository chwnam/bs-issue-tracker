<template>
  <tbody v-if="data">
    <tr v-for="item in data" :key="item.id">
      <template v-if="item.status === visibleItem">
        <td>
          {{item.id}}
        </td>
        <td>
          <a href="#">{{item.title}}</a>
        </td>
        <td>
          {{item.date}}
        </td>
        <td>
          {{item.modified}}
        </td>
        <td>
          {{item.status}}
        </td>
      </template>
    </tr>
  </tbody>
</template>

<script>

export default {
  name: 'IssueList',
  props: {
    data: Array,
    visibleItem: String
  },
  data() {
    return {
      items: [],
    }
  }
}
</script>