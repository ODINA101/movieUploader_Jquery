<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

  <!-- If you'd like to support IE8 -->
  <script src="http://content.jwplatform.com/libraries/NxsmWX2o.js"></script>
</head>
<body>
<div class="list">
</div>
<script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCp9QI_mUB7OHDw_glk56IUIwhoV_UR6lM",
    authDomain: "movies-7b17f.firebaseapp.com",
    databaseURL: "https://movies-7b17f.firebaseio.com",
    projectId: "movies-7b17f",
    storageBucket: "movies-7b17f.appspot.com",
    messagingSenderId: "439505540900"
  };
  firebase.initializeApp(config);
</script>

<div id="myDiv">This text will be replaced with a player.</div>

 

    <script>
  

     jwplayer("myDiv").setup({
    "file": "http://85.117.37.84/fast5/5203/5203_Georgian_300.mp4",
    "height": 360,
    "width": 640
}).on('setupError',()=>{
    console.log("error");
});




var firebaseRef = firebase.database().ref().child("ALLmovies").child("ანიმაცია");

firebaseRef.on("value",(snap)=>{
    
snap.forEach((snp)=>{
var mlist = document.querySelector(".list");
    

});

});
 
 
    </script>
    
</body>
</html>