const data = [
  {
    "id": "1",
    "title": "쪽지보내기 기능 제안",
    "date": "2020-05-22T14:26:27",
    "modified": "2020-06-07T03:03:58",
    "content": "<p>쪽지보내기 기능이 있으면 좋겠어요.</p><p>특정한 상대에게 개인적으로 메시지를 보내고 싶을 때 (상대방이 private한 질문을 했을 때, 답변하기 위한 용도 등), 보낼 수 있도록 쪽지보내기 기능이 있으면 좋겠어요.</p>",
    "status": "open",
    "categories": []
  },
  {
    "id": "2",
    "title": "아이패드 미니2 로그인 후 알림 및 정보수정 메뉴가 안보입니다.",
    "date": "2020-05-22T14:26:27",
    "modified": "2020-06-07T03:03:58",
    "content": "<p>우측 상단에 보시면 아이콘 탭하면 메뉴가 화면 밖으로 나가버려서 알림확인이랑 정보수정이 불가능 합니다.</p>",
    "status": "close",
    "categories": []
  },
  {
    "id": "3",
    "title": "회원정보보기에서 게시물, 스크랩 필터시 페이지네이션 문제",
    "date": "2020-05-22T14:26:27",
    "modified": "2020-06-07T03:03:58",
    "content": "<p><a href='http://okky.kr/user/info/163/articles?offset=20&max=20&sort=id&order=desc'>http://okky.kr/user/info/163/articles?offset=20&max=20&sort=id&order=desc</a> 형식으로 나와야 할 것 같습니다.</p>",
    "status": "open",
    "categories": []
  },
  {
    "id": "4",
    "title": "모바일 sidebar-header-icon 나타나지 않음.",
    "date": "2020-05-22T14:26:27",
    "modified": "2020-06-07T03:03:58",
    "content": "<p>아이폰의 사파리나 맥의 사파리 창 크기를 줄였을 때는 상단 좌측 사이드바 헤더 아이콘이 정상적으로 나타나는데, 아이패드 에서는 사이드바 헤더 아이콘이 나타나지 않아 이용에 불편함이 있네요.</p>",
    "status": "open",
    "categories": []
  },
]

export default {
  list() {
    return new Promise(res => {
      setTimeout(()=> {
        res(data)
      }, 200);
    })
  }
}