const data = {
  "id": "1",
  "title": "쪽지보내기 기능 제안",
  "author": "카레닌",
  "date": "2020-05-22T14:26:27",
  "modified": "2020-06-07T03:03:58",
  "content": "<p>쪽지보내기 기능이 있으면 좋겠어요.</p><p>특정한 상대에게 개인적으로 메시지를 보내고 싶을 때 (상대방이 private한 질문을 했을 때, 답변하기 위한 용도 등), 보낼 수 있도록 쪽지보내기 기능이 있으면 좋겠어요.</p>",
  "status": "open",
  "categories": ["기능 제안"]
};

export default {
  list() {
    return new Promise(res => {
      setTimeout(()=> {
        res(data)
      }, 200);
    })
  }
}