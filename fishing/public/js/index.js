Vue.component('board-list', {
  template: '<li class="board-list"><div class="board-list__upper">名前:{{name}} {{date}}</div>{{message}}</li>',
  props: ['name', 'message', 'date', 'id'],
})

Vue.component('board-form', {
  template: '<div class="form-area"><input v-model="name" placeholder="名前を入力"> </br>\
  <textarea id="message" name="message" v-model="message" placeholder="コメントを入力"></textarea> </br></br><button v-on:click="doAdd"> 投稿 </button></div>',
  data: function(){
    return{
      message: '',
      name: '',
    }
  },
  methods: {
    doAdd: function(){
      this.$emit('input', this.name, this.message)
      this.message =  ''
      this.name = ''
    }
  }
})

var board = new Vue({
  el: '#board',
  delimiters: ['{%', '%}'],
  data: {
    name: null,
    message: null,
    errors: [],
    lists: []
  },
  created: function(){
    var vue = this;
    firebase.database().ref('board').on('value', function(snapshot) {
      vue.lists = snapshot.val();
    });
  },
  methods: {
    doAdd: function(name, message){
      if( name == "" ){
	name = "匿名";
      }
      if( message == "" ){
	this.errors = [];
	this.errors.push("コメントを入力してください");
	return false;
      }else{
	this.errors = [];
      }
      var now = new Date();
      firebase.database().ref('board').push({
        name: name,
        message: message,
        date: now.getMonth()+1 + '月' + now.getDate() + '日' + now.getHours() + '時' + now.getMinutes() + '分'
      });
    }
  }
})

