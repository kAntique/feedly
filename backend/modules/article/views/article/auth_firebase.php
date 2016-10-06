<?php
 use yii\web\View;
  $this->title = 'Firebase Test';
  ?>


  <pre id="object"></pre>
  <?php $this->registerJsFile("https://www.gstatic.com/firebasejs/3.4.0/firebase.js")?>

   <?php $this->registerJs('
    (function(){
     const config = {
       apiKey: "AIzaSyBZHDdPdJqcosxbjUKlkFhCGi3tI8BRSmM",
       authDomain: "feedly-3aa96.firebaseapp.com",
       databaseURL: "https://feedly-3aa96.firebaseio.com",
       storageBucket: "feedly-3aa96.appspot.com",
       messagingSenderId: "403427122969"
     };
           firebase.initializeApp(config);

            const preObject = document.getElementById("object");
             const dbRefObject = firebase.database().ref().child("object");
             dbRefObject.on("value", snap => { preObject.innerText = JSON.stringify(snap.val(),
                null, 3); });
              }());',View::POS_END)?>
