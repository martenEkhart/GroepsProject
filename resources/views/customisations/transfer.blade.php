@extends('layouts.custom')
@section('content')
{{-- <canvas id="canvas" style="width: 300px; height 150px; position:fixed" ></canvas> --}}
<div class="flex-container" style="display:flex; justify-content: space-between;">
        
    <label id="name" style="font-size: 30px; color:blue" for="btnTurnL"></label>
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
      
{{-- <div class="flex-container" style="display:flex; justify-content: space-between;">
        
        <label id="name2" style="font-size: 30px; color:blue" for="btnTurnL2"></label>
            <button id="btnTurnL2" onclick="fnTurn(-1)" style="width: 100px; height: 40px; font-size:20px;" > < </button>
            <button onclick="fnTurn(1)" style="width: 100px; height: 40px; font-size:20px;"> > </button>
            <input style="height: 50px" id="checkbox2" type="checkbox" name="vehicle3" value="1" checked>Visible<br>
                
    
    </div> --}}
    
<div id="tixt">

</div>

<script>

function createImg(nr) {
    c = customisations[nr];
    cm[nr] = document.createElement('img');
    cm[nr].style.position = "absolute";
    cm[nr].src = "../images/customisations/" + c.image_name;
    cm[nr].style.left = c.x+ dotted.left + "px";
    cm[nr].style.top = c.y + dotted.top + "px";
    cm[nr].height = c.height;
    cm[nr].width = c.width;
    cm[nr].style.zIndex = c.z_layer;
    cm[nr].style.opacity = c.opacity/100;
    document.body.appendChild(cm[nr]);
    
}   

 var counter = 0;
 var cm = [];

 var dotted = document.getElementById("dott").getBoundingClientRect();
//  var img = document.getElementById("img");
//  img.style.opacity = 0.7;
//  img.style.left = dotted.left +"px";
//  img.style.top = dotted.top +"px";
 

  var tel = 0;
//   im1 = document.getElementById("img");
  tixt = document.getElementById("tixt");

  var customisations = {!! json_encode($customisations->toArray()) !!};
    document.getElementById("name").innerHTML = customisations[counter].name;

  for(i=0; i<customisations.length; i++) {
    createImg(i);   
  }
  
  im1 = cm[0];
   
    function updateForm() {

    }
  
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
        fnVolgende(counter);
    }

    function fnVolgende(counter) {
        document.getElementById("name").innerHTML = customisations[counter].name+ " id:"+customisations[counter].id;
     //   document.getElementById("name2").innerHTML = customisations[counter].name+ " id:"+customisations[counter].id;
        im1 = cm[counter];
        // im1.src = "../images/customisations/" + customisations[counter].image_name;
        // im1.style.left = customisations[counter].x;
        // im1.style.top = customisations[counter].y;
        // im1.height = customisations[counter].height;
        // im1.width = customisations[counter].width;
        // im1.style.zIndex = customisations[counter].z_layer;
        // im1.style.opacity = customisations[counter].opacity/100;
        document.getElementById("checkbox").checked = customisations[counter].visible;
     //   document.getElementById("checkbox2").checked = customisations[counter].visible;
    }

    function fnMouseZindex(e) {
        im1.style.zIndex = e.clientX-parseInt(document.getElementById("progressZindex").style.width);
       tixt.innerHTML = e.clientX-(parseInt(document.getElementById("progressZindex").style.width));
        // alert(e.clientX);
    }

    function fnMouseOpacity(e) {
        im1.style.opacity = (e.clientX-50)/(parseInt(document.getElementById("progressOpacity").style.width)*3);
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
   }
 
  function fnSize(size) {
    if(((parseInt(im1.height)<20)&&(size<1))||((parseInt(im1.style.width)>parseInt(window.innerWidth-100))&&(dx >1))) { return }  
    im1.height = im1.height*size;
    im1.width = im1.width*size;
    //im1.style.height = parseInt(im1.style.height)*size+"px";     
    }
  
    
  
   
   </script>


@endsection
