@extends('layouts.custom')
@section('content')
<canvas id="canvas" style="width: 300px; height 150px; position:fixed" ></canvas>
<div class="flex-container" style="display:flex; justify-content: space-between;">
        
    <label id="name" style="font-size: 30px; color:blue" for="btnTurnL"></label>
        {{-- <div id="name" style="font-size: 30px; color:blue"> </div> --}}
        <button id="btnTurnL" onclick="fnTurn(-1)" style="width: 100px; height: 40px; font-size:20px;" > < </button>
        <button onclick="fnTurn(1)" style="width: 100px; height: 40px; font-size:20px;"> > </button>
        <input style="height: 50px" id="checkbox" type="checkbox" name="vehicle3" value="1" checked>Visible<br>
            

</div>

<div id="dott" style="left: 0px; top: 0px; width: 25em; height:17em; border-style:dotted; border-width:2px">
        .... website borders
        
</div>  
  
<br />
<div style="max-width: 400px">
    <div id="imga"  style=" max-width:100%; width: 200px; height: 100px; position:fixed; left:0px; top: 0px">
    </div>
    <div class="progress" style="height: 40px;">    
            <div id="progressOpacity" onmousemove="fnMouseOpacity(event)" class="progress-bar bg-info" role="progressbar" style="width: 100%" 
            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">more transparent - - - - - - - - - - - - - - -  less transparent 
            </div>
        </div>
        <br />
        <div  class="progress" style="height: 40px;">    
        <div id="progressZindex"  onmousemove="fnMouseZindex(event)" class="progress-bar bg-success" role="progressbar" style="width: 100%" 
        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">to the back - - - - - - - - - - - - - - -  to the front 
        </div>
    </div>
</div>
<br />
<div>
    <div id="horVertBtns" class="btn-group btn-group-lg" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary" onclick="fnHor(-45)">LEFT</button>
        <button type="button" class="btn btn-secondary" onclick="fnVert(-45)">TOP</button>
        <button type="button" class="btn btn-secondary" onclick="fnVert(15)">BOTTOM</button>
        <button type="button" class="btn btn-secondary" onclick="fnHor(15)">RIGHT</button>
        <button type="button" class="btn btn-secondary"></button>
        <button type="button" class="btn btn-secondary" onclick="fnHor(-1)">left</button>
        <button type="button" class="btn btn-secondary" onclick="fnVert(-1)">top</button>
        <button type="button" class="btn btn-secondary" onclick="fnVert(1)">bottom</button>
        <button type="button" class="btn btn-secondary" onclick="fnHor(1)">right</button>
    </div>
</div>

<div id="smallBigBtns">
        <br />
    <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary" onclick="fnSize(1/1.1)">SMALLER</button>
        <button type="button" class="btn btn-secondary"  onclick="fnSize(1.1)">BIGGER</button>
        <button type="button" class="btn btn-secondary"></button>
        <button type="button" class="btn btn-secondary"></button>
        <button type="button" class="btn btn-secondary" ></button>
        <button type="button" class="btn btn-secondary" onclick="fnDone()">Done</button>
        <button type="button" class="btn btn-secondary"></button>
        <button type="button" class="btn btn-secondary"></button>
        <button type="button" class="btn btn-secondary"></button>
        <button type="button" class="btn btn-secondary" onclick="fnSize(1/1.0005)">smaller</button>
        <button type="button" class="btn btn-secondary" onclick="fnSize(1.01)">bigger</button>
    </div>
</div>

<div id="list" style="position:absolute">
   
</div>
      
<img id="img" src="../images/customisations/p2.png" alt="Smiley face" height="auto" width="auto" style="left: 0px; position:absolute">
<div id="tixt">

</div>

 
<script>
 var counter = 0;
 var moveImage = true;
 var c=document.getElementById("canvas");
 var dotted = document.getElementById("dott").getBoundingClientRect();//document.getElementById("dotted");
 //var im = document.getElementById("imga");
 var img = document.getElementById("img");
 img.style.opacity = 0.7;
 //im.style.left = dotted.left +"px";
 //im.style.top = dotted.top +"px";
 img.style.left = dotted.left +"px";
 img.style.top = dotted.top +"px";
 

  var tel = 0;
  im1 = document.getElementById("img");
  tixt = document.getElementById("tixt");
  
    function fnTurn(dx) {
        if((counter <= 0)&&(dx == -1)) {
            counter = customisations.length-1;
        } else {
            if ((counter >= customisations.length-1)&&(dx == 1)) {
                counter = 0;
            } else {
                counter += dx;
            }

        }
        tixt.innerHTML = counter;
        fnVolgende(counter);
    }
    
    function fnVolgende(counter) {
        document.getElementById("name").innerHTML = customisations[counter].name;
        im1.src = "../images/customisations/" + customisations[counter].image_name;
        im1.style.left = customisations[counter].x;
        im1.style.top = customisations[counter].y;
        im1.height = customisations[counter].height;
        im1.style.zIndex = customisations[counter].z_layer;
        im1.style.opacity = customisations[counter].opacity;
        document.getElementById("checkbox").checked = customisations[counter].visible;
    }

    function fnMouseZindex(e) {
        img.style.zIndex = e.clientX-parseInt(document.getElementById("progressZindex").style.width);
       tixt.innerHTML = e.clientX-(parseInt(document.getElementById("progressZindex").style.width));
        // alert(e.clientX);
    }

    function fnMouseOpacity(e) {
        img.style.opacity = (e.clientX-50)/(parseInt(document.getElementById("progressOpacity").style.width)*3);
       tixt.innerHTML = e.clientX;
       // alert(e.clientX);
    }

  function fnHor (dx) {
    if(((parseInt(im1.style.left)<0)&&(dx<0))||((parseInt(im1.style.left)>parseInt(window.innerWidth-100))&&(dx >0))) { return }
    
    im1.style.left = parseInt(im1.style.left)+dx +"px";  
  }

  function fnDone() {
       document.getElementById("smallBigBtns").style.display = "none";
      document.getElementById("horVertBtns").style.display = "none";

  }
 
  function fnVert (dx) {
    if(((parseInt(im1.style.top)<-70)&&(dx<0))||(((parseInt(im1.style.top)+parseInt(im1.height))>window.innerHeight-50)&&(dx >0))) { return }
    im1.style.top = parseInt(im1.style.top)+dx +"px";  
   // tixt.innerHTML = parseInt(im1.style.top) + "  "+parseInt(window.innerHeight-100);
   tixt.innerHTML =im1.style.bottom + "  jkd  " +parseInt(im1.style.top)+parseInt(im1.height);
  }
 
  function fnSize(size) {
    if(((parseInt(im1.height)<20)&&(size<1))||((parseInt(im1.style.width)>parseInt(window.innerWidth-100))&&(dx >1))) { return }  
    im1.height = im1.height*size;
    //im1.style.height = parseInt(im1.style.height)*size+"px";
      
      
      
  }
  
    
  var customisations = {!! json_encode($customisations->toArray()) !!};
    document.getElementById("name").innerHTML = customisations[counter].name;
   //alert(customisations[1].name);
   tixt.innerHTML = customisations.length;
   </script>

@endsection
