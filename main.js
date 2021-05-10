Vue.config.devtools = true;

var app = new Vue ({
  el: '#root',
  data: {

  },
  mounted() {
    axios.get('http://localhost:8888/db-hotel/stanze.php')
    .then((response) => {
      console.log(response.data.response)
    })
  }
});
