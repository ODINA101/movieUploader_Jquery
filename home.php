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

        <div class="container">
                კინოს სახელი:<input type="text" id="name" placeholder="კინოს სახელი" name="name" class="form-control"><br>
                აღწერა:<textarea placeholder="აღწერა" id="agwera" name="agwera" class="form-control" rows="5"></textarea><br>
                ფოტო:<input type="text" placeholder="ფოტო" id="photo" name="photo" class="form-control"><br>
                ვიდეოURL:<input type="text" placeholder="ვიდეოს ლინკი HD" id="hd" name="hd" class="form-control"><br>
                ვიდეოURL:<input type="text" placeholder="ვიდეოს ლინკი sd" id="sd" name="sd" class="form-control"><br>
                Imdb:<input type="text" placeholder="Imdb" name="imdb" class="form-control"><br>




                </div>
<button class="btn btn-danger" onclick="location.href='dataChanger.php'">ფილმის რედაქტირება</button>
<button class="btn btn-primary" onclick="location.href='search.php'">ფილმის ძიება</button>

<button class="btn btn-success" onclick="location.href='checklinks.html'">რომელი ფილმები არ ირთვება?</button><br><br>


    <script src="https://www.gstatic.com/firebasejs/4.8.1/firebase.js"></script>
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

var formArray = {};



 checkboxs = ["მთავარი","კომედია","ანიმაცია","ბოევიკი","ბიოგრაფიული","ზღაპრული","ისტორიული","კრიმინალური"
 ,"ფანტასტიკა","თრილერი","მისტიკური","საშინელება","დრამა","მძაფრსიუჟეტიანი","სათავგადასავლო","დოკუმენტრური"];

 for(var i=0;i<checkboxs.length;i++) {
var checkbox = document.createElement('input');
checkbox.type = "checkbox";
checkbox.name = "name";
checkbox.value = "value";
checkbox.id = "id" + i;

var label = document.createElement('label')
label.htmlFor = "id" + i;
label.appendChild(document.createTextNode(checkboxs[i]));

document.body.appendChild(checkbox);
document.body.appendChild(label);
 }
var socket = io('https://nameless-ocean-54565.herokuapp.com');
 jQuery(($)=>{

  $("#id0").prop('checked', true);
  var ref
 $("#upBTN").click(()=>{


formArray = {name:$("#name").val(),
            agwera:$("#agwera").val(),
            photo:$("#photo").val(),
            hd:$("#hd").val(),
            sd:$("#sd").val()
            }

            for(var i=0;i<checkboxs.length;i++) {
                     if(document.getElementById("id" + i).checked) {
                       console.log(checkboxs[i]);
                  
ref = firebase.database().ref("ALLmovies/" + checkboxs[i]);
                       ref.push({name:formArray.name,
                                 des:formArray.agwera,
                                 photo:formArray.photo,
                                 hd:formArray.hd,
                                 sd:formArray.sd});
                     }else{

                     $("#id0").prop('checked', true);
                     console.log("egari");
                     }

            }

        var text = document.createElement("h1");
        text.style.color ="blue";
        text.innerHTML = "refresh";
        for(var i=0;i<30;i++) {
          document.body.appendChild(text);
        }

 });
});
</script>
<br><br>
  <button id="upBTN" class="btn btn-success">ატვირთვა</button>
  <button id="push" class="btn btn-danger">push</button>

</body>
</html>
 <script>
   $("#push").click(function() {


    socket.emit('push',$("#name").val());
    alert("pushed");
   });

</script>
