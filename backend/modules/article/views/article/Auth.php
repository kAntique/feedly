
<?php

  $this->title = 'Firebase Test';
  ?>
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

          const txtEmail = document.getElementById("txtEmail");
          const txtPassword = document.getElementById("txtPassword");
          const btnLogin = document.getElementById("btnLogin");
          const btnSignUp = document.getElementById("btnSignUp");
          const btnLogOut = document.getElementById("btnLogOut");

          btnLogin.addEventListener("click", e =>{
            const email = txtEmail.value;
            const pass = txtPassword.value;
            const auth = firebase.auth();

            const promise = auth.signInWithEmailAndPassword(email,pass);
            promise.catch(e => console.log(e.message));

          });

          btnSignUp.addEventListener("click", e =>{
            const email = txtEmail.value;
            const pass = txtPassword.value;
            const auth = firebase.auth();

            const promise = auth.createUserWithEmailAndPassword(email,pass);
            promise.catch(e => console.log(e.message));

          });

          btnLogOut.addEventListener("click", e =>{
            firebase.auth().signOut();
          });

          firebase.auth().onAuthStateChanged(firebaseUser => {
            if(firebaseUser){
              console.log(firebaseUser);
              btnLogOut.classList.remove("hide");
            }else{
              console.log("not logged in");
                btnLogOut.classList.add("hide");
            }
          });
              }());')?>


  <div>
    <input id="txtEmail" type="email" placeholder="Email"><br>
    <input id="txtPassword" type="password" placeholder="Password"><br>
    <button id="btnLogin" class="btn btn-action">Login</button><br>
    <button id="btnSignUp" class="btn btn-secondary">SignUp</button><br>
    <button id="btnLogOut" class="btn btn-action hide">LogOut</button><br>
  </div>
