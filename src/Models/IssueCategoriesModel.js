const data = [
  "기능 제안", "버그", "그냥 심심해서"
];

export default {
  list() {
    return new Promise(res => {
      setTimeout(()=> {
        res(data)
      }, 200);
    })
  }
}