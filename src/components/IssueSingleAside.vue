<template>
  <aside>
      {{status}}
      <ul>
          <li>
              <button @click="onClickModify">수정</button>
          </li>
          <li>
              <button @click="onClickRemove">제거</button>
          </li>
          <li>
              <template v-if="status === 'open'">
                <input type="checkbox" id="check-close" @change="onChangeStatus('close')">
                <label for="check-close">이슈 닫힘 처리</label>
              </template>
              <template v-else-if="status === 'close'">
                <input type="checkbox" id="check-open" @change="onChangeStatus('open')">
                <label for="check-open">이슈 열림 처리</label>
              </template>
          </li>
      </ul>
    </aside>
</template>

<script>

import EventBus from '../EventBus'

export default {
  name: 'IssueSingleAside',
  props: {
    status: String
  },
  methods: {
    onClickModify(){
      EventBus.$emit('onClickModify');
    },
    onClickRemove(){
      EventBus.$emit('onClickRemove');
    },
    onChangeStatus(v){
      EventBus.$emit('onChangeStatus', v);
    },
  }
}
</script>