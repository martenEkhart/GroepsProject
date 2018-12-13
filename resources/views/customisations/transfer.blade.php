@extends('layouts.custom')
@section('content')
<div class="flex-container" style="display:flex; justify-content: space-between;">
        
        <button id="btnTurnL" onclick="fnTurn(-1)" style="width: 100px; height: 40px; font-size:20px;" > < </button>
        <button onclick="fnTurn(1)" style="width: 100px; height: 40px; font-size:20px;"> > </button>
        <label id="name" style="font-size: 30px; color:blue" for="btnTurnL"></label>
        <input style="height: 50px" id="checkbox" type="checkbox" name="vehicle3" value="1" checked>Visible<br>
            

</div>
<br>

<div onscroll ="testest()" id="dott" style="left: 0px; top: 0px; width: 300px; height:200px; ">
        
        
</div>  
<br /><br /><br />
<div class="wrapper4">
		<div id="divUp" class="box aUp" onclick="fnVert(-1)">Up</div>
		<div id="divDown" class="box aDown" onclick="fnVert(1)">Down</div>
		<div id="divUpF" class="box aUpF" onclick="fnUp()">UP</div>
		<div id="divDownF" class="box aDownF" onclick="fnDown()">DOWN</div>
		<div id="divLeft" class="box aLeft" onclick="fnLeft()">Left</div>
        <div id="divRight" class="box aRight" onclick="fnRight()">Right</div>
        <div id="divSmaller" class="boxSmallBig aSmaller" onclick="fnSmaller(5)">Smaller</div>
        <div id="divBigger" class="boxSmallBig aBigger" onclick="fnBigger()">Bigger</div>
        <div id="divDone" class="box aDone">Done</div>
        <div id="divTransparency" class="boxtransparency aTransparancy" onmousemove="fnMouseOpacity()">transparency</div>
        <div id="divZindex" class="box aZindex" onmousemove="fnMouseZindex()">back - front</div>
        
        <a href="/customisation/create" target="_parent"><div id="divNew" class="boxnew aNew" onclick="fnNew()">new image</div></a>

</div>


@csrf
<button id="btnSend" onclick="loadDoc('POST', '/customisations/changedata', changeDiv, 'tixt',  'name')">send</button>
    
<div id="tixt">

</div>
<script>
function testest(){
    alert("testst");
}
 

 var counter = 0;
 var cm = [];

 var dotted = document.getElementById("dott").getBoundingClientRect();

  var tel = 0;
  tixt = document.getElementById("tixt");

  var customisations = {!! json_encode($customisations->toArray()) !!};
    document.getElementById("name").innerHTML = customisations[counter].name;

  if (customisations.length == 0) {
      alert("nog niets");
  } 
  createWebsiteBorders();
  for(i=0; i<customisations.length; i++) {
    createImg(i);   
  }
  
  im1 = cm[0];

  function makeCanvas() {
    //   createElement
  }

  function createImg(nr) {
    c = customisations[nr];
    cm[nr] = document.createElement('img');
    cm[nr].style.position = "absolute";
    cm[nr].src = "../images/customisations/" + c.image_name;
    cm[nr].style.left = c.x+  "px";
    cm[nr].style.top = c.y +  "px";
    cm[nr].height = c.height;
    cm[nr].width = c.width;
    cm[nr].style.zIndex = c.z_layer;
    cm[nr].style.opacity = c.opacity/100;
    document.body.appendChild(cm[nr]);    
}   

function createWebsiteBorders() {
    webBorder = document.createElement('img');
    webBorder.style.position = "absolute";
    webBorder.src = "../images/customisations/website-borders.png" ;
    webBorder.style.left = 200+  "px";
    webBorder.style.top = 160 +  "px";
    webBorder.height = 230;
    webBorder.width = 370;
    webBorder.style.zIndex = 0;
    webBorder.style.opacity = 1;
    document.body.appendChild(webBorder);    
}   

    function updateForm() {

    }
  
    function fnTurn(nr) {
        if((counter <= 0)&&(nr == -1)) {
            counter = customisations.length-1;
        } else {
            if ((counter >= customisations.length-1)&&(nr == 1)) {
                counter = 0;
            } else {
                counter += nr;
            }

        }
        fnVolgende(counter);
    }

    function fnVolgende(counter) {
        document.getElementById("btnSend").onclick();
        document.getElementById("name").innerHTML = customisations[counter].name;
        im1 = cm[counter];
        document.getElementById("checkbox").checked = customisations[counter].visible;
    }

    function fnMouseZindex() {
        im1.style.zIndex = Math.floor((event.offsetX/document.getElementById("divZindex").clientWidth - 0.5)*100 );
    //   tixt.innerHTML = Math.floor((event.offsetX/document.getElementById("divZindex").clientWidth - 0.5)*100 );
        // alert(e.clientX);
    }

    function fnMouseOpacity() {
  //      tixt.innerHTML = event.offsetX/document.getElementById("divTransparency").clientWidth;
        im1.style.opacity = (event.offsetX/document.getElementById("divTransparency").clientWidth)*1.5-0.05;
        
       // alert(e.clientX);
    }

  function fnHor (dx) {
    if(((parseInt(im1.style.left)<30)&&(dx<0))||((parseInt(im1.style.left)>parseInt(window.innerWidth-150))&&(dx >0))) { return }
    customisations[counter].x = parseInt(im1.style.left);
    im1.style.left = customisations[counter].x+dx +"px";  
    

  }

  function fnLeft () {
   let dx = event.offsetX/document.getElementById("divLeft").clientWidth;
   if (dx < 0.5) { fnHor(-1*(76-(dx*150)))} else { fnHor(-1)}
 //  tixt.innerHTML = document.getElementById("divLeft").clientWidth;
  }

  function fnRight () {
   let dx = event.offsetX/document.getElementById("divRight").clientWidth;
   if (dx > 0.5) { fnHor((76-((1-dx)*150)))} else { fnHor(1)}
  }

  function fnUp() {
    let dy = event.offsetX/document.getElementById("divUpF").clientWidth;
    if (dy > 0.15) {fnVert(-1*(dy*50)-1); } else {fnVert(-1)}
    }
  
  function fnDown() {
    let dy = event.offsetX/document.getElementById("divDownF").clientWidth;
    if (dy > 0.15) {fnVert(dy*50+1);} else { fnVert(1)}
        
  }

    function fnDone() {
    loadDoc('POST', '/customisations/changedata', changeDiv, 'tixt',  'name')
  }
 
  function fnVert (dy) {
    if(((parseInt(im1.style.top)<-20)&&(dy<0))||(((parseInt(im1.style.top)+parseInt(im1.height))>window.innerHeight-150)&&(dy >0))) { return }
    customisations[counter].y = parseInt(im1.style.top);
    im1.style.top = customisations[counter].y+dy +"px"; 
   }
 
  function fnSize(size) {
    if(((parseInt(im1.height)<20)&&(size<1))||((parseInt(im1.style.width)>parseInt(window.innerWidth-100))&&(dx >1))) { return }  
    im1.height = im1.height*size;
    im1.width = im1.width*size;
    //im1.style.height = parseInt(im1.style.height)*size+"px";   
    tixt.innerHTML = im1.clientWidth+" "+im1.clientWidth;  
    }

    function fnSmaller(e) {
        let dx = (event.offsetX/document.getElementById("divSmaller").clientWidth)/10;
        fnSize(1/(1+dx));

   }
  
    function fnBigger(e) {
        let dx = (event.offsetX/document.getElementById("divBigger").clientWidth)/10;
        fnSize(1+dx+0.01);
    }
  
    function maakKlaar() {
    //    customisations[counter].x = im1.style.left;
    //    customisations[counter].y = im1.style.top;
        customisations[counter].width = im1.clientWidth;
        customisations[counter].height = im1.clientHeight;
        customisations[counter].opacity = im1.style.opacity;
        customisations[counter].z_layer = im1.style.zIndex;
        if(customisations[counter].opacity > 1) {customisations[counter].opacity = 1}
     //   alert(customisations[counter].opacity);
     //   if (cm[counter].style.opacity > 1) { cm[counter].style.opacity = 1 }

    }

    function loadDoc(method, url, myFunction, div, input) {
    if (window.XMLHttpRequest) {
        var xhttp = new XMLHttpRequest();
    } else {
        var xhttp = new ActiveXObject();
    }
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myFunction(this, div);
        }                    
    }
    xhttp.open(method, url, true);
    if (method == 'POST') {
    //   alert(cm[counter].style.opacity);
        maakKlaar();
    //    alert(objToString(customisations[counter]));
        var data = objToString(customisations[counter]);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.querySelector("meta[name='csrf-token']").getAttribute("content"));
        xhttp.send(data);
        
    } else {
        xhttp.send();
    }
}

function buildData (nr) {
    text = '';

}

function objToString (obj) {
    var str = '';
    for (var p in obj) {
        if (obj.hasOwnProperty(p)) {
            str += p + '=' + obj[p] + '&';
        }
    }
    return str;
}

function changeDiv(xhttp, div) {
    document.getElementById(div).innerHTML = xhttp.responseText;
}
     
   </script>


@endsection
