<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

       <center>
        <br>
           
        <input type="text"  id="krakadili" class="form-control col-5" placeholder="ფილმის სახელი">   
        <br>
        <br>
     
        <button class="btn btn-primary" onclick="datachanged()">ძიება</button>
        <br>
        <br>
        <div id="dataPl">


        </div>
            
            </center>
              <script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
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
<script>



 var mData = ``;
 jQuery(($)=>{});
function datachanged() {

    var el = document.querySelector("#krakadili");


console.log(el.value);
var ref = firebase.database().ref().child("ALLmovies").child("მთავარი").orderByChild("name").equalTo(el.value);

ref.on("value",(data)=>{
   mData = ``;
data.forEach((snap)=>{
    
    console.log(snap.key);
   mData = `  <div class="card" style="width: 40rem;">
                <div class="card-block">
                  <h4 class="card-title">${snap.val().name}</h4>
                  <p class="card-text">sd:${snap.val().sd}</p>
                  <p class="card-text">hd:${snap.val().hd}</p>
                  
                </div>
              </div>` + mData;
    
              $("#dataPl").html(mData);

});
//



});

}

</script>

</body>
</html>