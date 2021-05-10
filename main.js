Vue.config.devtools = true;

var app = new Vue ({
  el: '#root',
  data: {
    rooms: [],
    room: {}          //se metto NULL al posto delle {}, non si vedra' neppure l'estetica html di v-if
  },
  mounted() {
    axios.get('http://localhost:8888/db-hotel/stanze.php')
    .then((response) => {
      this.rooms = response.data;
    });
  },
  methods: {
    getById: function(id) {
      axios.get('http://localhost:8888/db-hotel/stanze.php?id='+id) //questo pezzo di codice e' collegato a stanza.php (il primo if)
      .then((response) => {                                           //al click su di una stanza mi resituira' i suoi valori (quindi visualizzera' le info contenute al suo interno)
        this.room = response.data[0];                        //response [0] e' collegato al div con V-if che solo al click mi mostrera' i dati altrimenti nulla [indice 0]
      });
    }
  }
});
