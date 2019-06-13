<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Fishing SNS</title>
  <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>
<body>
  <!-- The core Firebase JS SDK is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/6.1.1/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/6.1.1/firebase-database.js"></script>

  <!-- TODO: Add SDKs for Firebase products that you want to use
       https://firebase.google.com/docs/web/setup#config-web-app -->
  <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
      apiKey: "AIzaSyCNR2GfnpHqdNyAEchIDkBuW--pu4h3mmY",
      authDomain: "submission-bbs.firebaseapp.com",
      databaseURL: "https://submission-bbs.firebaseio.com",
      projectId: "submission-bbs",
      storageBucket: "submission-bbs.appspot.com",
      messagingSenderId: "789528655161",
      appId: "1:789528655161:web:7d1ec16283d7a7ac"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
  </script>

  <div id="board">
    <h2 class="board-title">掲示板</h2>
    <ul class="lists" style="list-style-type: none">
      <board-list v-for="(list, key) in lists"
        :key="key"
        :name="list.name"
        :message="list.message"
        :date="list.date">
      </board-list>

    </ul>
    <center><board-form v-on:input="doAdd"></board-form></center>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
  <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
