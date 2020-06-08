<template>
  <tbody>
      <tr v-for="item in data" :key="item.id">
        <template v-if="item.status === visibleItem">
          <td>
            {{item.id}}
          </td>
          <td>
            <router-link :to="'/'+item.id">{{item.title}}</router-link>
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

import router from '../routes'

export default {
  router,
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