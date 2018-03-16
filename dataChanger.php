
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
    <title>Document</title>
</head>
<body>
        სახელი <input type="text" placeholder="name" id="name" class="form-control"> <br>

    ლინკი sd<input type="text" placeholder="sd" id="sd" class="form-control"> <br>
    ლინკი hd<input type="text" placeholder="hd" id="hd" class="form-control"> <br>
    <button id="upBTN" class="btn btn-info">update</button>
    <script>
    setInterval(()=>{
      var el = document.querySelector("#hd");
    var val =  el.value.replace(/\s+/g, '');
 el.value = val;

    var el1 = document.querySelector("#sd");
    var val1 = el1.value.replace(/\s+/g, '');

 el1.value = val1;

  },10);


    </script>

</body>
</html>

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

////////////////////////////////////
checkboxs = ["მთავარი","კომედია","ანიმაცია","ბოევიკი","ბიოგრაფიული","ზღაპრული","ისტორიული","კრიმინალური"
 ,"ფანტასტიკა","თრილერი","მისტიკური","საშინელება","დრამა","მძაფრსიუჟეტიანი","სათავგადასავლო","დოკუმენტრური"];



 jQuery(($)=>{
});

  $("#id0").prop('checked', true);
  var ref2
 $("#upBTN").click(()=>{



            for(var i=0;i<checkboxs.length;i++) {
                       console.log(checkboxs[i]);
                      up("ALLmovies/" + checkboxs[i]);

                     }

            });



////////////////////////////////////

function up(ref) {
    console.log(ref);
    var sd = document.querySelector("#sd").value;
    var name = document.querySelector("#name").value;

    var hd = document.querySelector("#hd").value;
     getData(ref,name,sd,hd);
}

function getData(ref,order,sd,hd)  {
   var moviesref = firebase.database().ref(ref).orderByChild("name").equalTo(order);
  moviesref.on("value",(snap)=>{
snap.forEach((childsnap) => {
    var card = document.createElement("button");
    card.innerHTML = childsnap.val().name;
    card.id = childsnap.key;

      console.log(childsnap.key);
      firebase.database().ref(ref + "/" + childsnap.key).update({sd:sd,hd:hd});
});
var text = document.createElement("h1");
text.style.color ="blue";
text.innerHTML = "refresh";
  document.body.appendChild(text);


});
}
//////////////////////////////////////////////////////

</script>
