@extends('layouts.custom')
@section('content')



 
        <label id="name" style="font-size: 30px; color:blue; position:absolute; " ></label>
        {{-- <input style="z-index: 1111111108; position:absolute; height: 50px; zoom: 1;" id="checkbox" type="checkbox" 
         name="ivisible" value="1" checked><br> --}}


{{-- <div onscroll ="testest()" id="dott" style="left: 0px; top: 0px; width: 300px; height:200px; ">


</div>

<div class="wrapper4" style="padding: 10px; background-color:#f8f6ff">
		<div id="divUp" class="box aUp" onclick="fnVert(-1)">Up</div>
		<div id="divDown" class="box aDown" onclick="fnVert(1)">Down</div>
		<div id="divUpF" class="box aUpF" onclick="fnUp()">UP</div>
		<div id="divDownF" class="box aDownF" onclick="fnDown()">DOWN</div>
		<div id="divLeft" class="box aLeft" onclick="fnLeft()">Left</div>
        <div id="divRight" class="box aRight" onclick="fnRight()">Right</div>
        <div id="divSmaller" class="boxSmallBig aSmaller" onclick="fnSmaller(5)">Smaller</div>
        <div id="divBigger" class="boxSmallBig aBigger" onclick="fnBigger()">Bigger</div>
        <div id="divDone" class="box aDone" onclick="doeSave()">Done</div>
        <div id="divTransparency" class="boxtransparency aTransparancy" onmousemove="fnMouseOpacity()">transparency</div>
        <div id="divZindex" class="box aZindex" onmousemove="fnMouseZindex()">back - front</div>

        <a href="/customisation/create" target="_parent"><div id="divNew" class="boxnew aNew" onclick="fnNew()">new image</div></a>

</div> --}}


 <div onresize="fnresize()" id="div0" style="position: fixed; top: 67px; height: 430px; display: grid; grid-template-columns: auto auto; grid-template-rows: 100% ;">
        <div id="div1" class="item1" ></div>
        <div style="display: grid; grid-template-columns: auto auto; grid-template-rows: 33.33% 33.33% 33.33% ;">
          
            <div id="dsize"  style="background-color:#72A2C0; background-image: url('/images/bg1/size.png'); background-size: 100% 100%;">
            </div>
            <div id="dtransparency" onclick="fnTransparency()" style="background-color:#1D65A6; background-image: url('/images/bg1/transparency.png'); background-size: 100% 100%;">
            </div>
            <div id="dmove" style="background-color:#00743F; background-image: url('/images/bg1/move.png'); background-size: 100% 100%;">
            </div>
            <div id="dlayer" onclick="fnLayer()" style="background-color:#06437A; background-image: url('/images/bg1/layer.png'); background-size: 100% 100%;">
            </div>
            <div style="display: grid; grid-template-columns: auto auto; grid-template-rows: 33.3% 33.3% 33.3% ;">
                    <div id="d" onclick="fnTransparency()" style="background-color:#06437A; background-size: 100% 100%;" >
                    </div>
                    <div id="d" onclick="fnMove()" style="background-color:#06437A; background-size: 100% 100%;">
                    </div>
                    <div id="dvorige" style="background-color:#72A2C0; background-image: url('/images/bg1/vorige.png'); background-size: 100% 100%;">
                    </div>
                    <div id="dvolgende" style="background-color:#1D65A6; background-image: url('/images/bg1/volgende.png'); background-size: 100% 100%;">
                    </div>
                    <div id="dnew"  style="background-color:#F2A104; background-image: url('/images/bg1/new.png'); background-size: 100% 100%;">
                    </div>
                    <div id="ddelete" onclick="deleteData(1, 2)" style="background-color:#7F5417; background-image: url('/images/bg1/delete.png'); background-size: 100% 100%;">
                    </div>
                                       
           
            </div>
            <div style="display: grid; grid-template-columns: auto ; grid-template-rows:50% 50% ;">
                <div id="drotation"  style="background-color:#7F171F; background-image: url('/images/bg1/rotation.png'); background-size: 100% 100%;"></div>
                <div id="dratio"  style="background-color:rgb(106, 120, 25); background-image: url('/images/bg1/ratio.png'); background-size: 100% 100%;"></div>
            </div>
        </div>
      </div>
    


@csrf
{{-- <div id="tixt" style="position:fixed; left:100px; top: 25px"></div>
<div id="tixt2" style="position:fixed; left:100px; top: 55px"></div> --}}
<canvas id="canvas"  width="200" height="200" style="position:absolute;"></canvas>
<canvas id="websiteBorders"  width="1584" height="748" style="position:absolute; left: 0px; top: 67px; "></canvas>
<img id="redarrow" src="/images/bg1/boxselect.png" style="left: 40px; top: 40 px; position:absolute; z-index:100000" >
<script>
function testest(){
    alert("testst");
}


 var counter = 0;
 var cim = [];

 var mouseHold = false;
 var mouseCorX = 0;
 var mouseCorY = 0;
 var cddx = 0;
 var cddy = 0;

 var ccy = 67;
 var oxf = 147/1536;
 var oyf = 120/656;
 var dxf = 445/1536;
 var dyf = 397/723;
 var webBorder = document.getElementById("websiteBorders");
 drawWebsiteBorders();
 


  var tel = 0;
//   tixt = document.getElementById("tixt");

  var customisations = {!! json_encode($customisations->toArray()) !!};
    document.getElementById("name").innerHTML = customisations[counter].name;


  if (customisations.length == 0) {
      alert("nog niets");
  }
  for(i=0; i<customisations.length; i++) {
    createImg(i);
  }
  positionRelative();
  markeer();
 
    window.onload = function(){
        document.getElementById("div0").style.height = window.innerHeight-72   + "px";
        document.getElementById("div0").style.width = window.innerWidth-5 + "px";
    }

    window.onresize = function(){
  //      alert("d");

        document.getElementById("div0").style.height = window.innerHeight -72 + "px";
        document.getElementById("div0").style.width = window.innerWidth-5 + "px";
        drawWebsiteBorders();
         positionRelative();
         markeer();
   //      tixt.innerHTML = Math.floor(((window.innerHeigt-ccy)/5*2);
    }

function fnresize(){ 
}
   

  function markeer() {
   var i = cim[counter];
    var dimg = document.getElementById("redarrow");
    dimg.style.left  =  Math.round(parseInt(i.style.left)-10)+"px";
    dimg.style.top  =  Math.round(parseInt(i.style.top)-10)+"px";
    dimg.width = i.clientWidth+20;
    dimg.height = i.clientHeight+20;
   //tixt.innerHTML = "bud"+cim[counter].style.left;//+ Math.round(parseInt(i.style.left)+i.clientWidth/2);
  }

  function createImg(nr) {
    c = customisations[nr];
    cim[nr] = document.createElement('img');
    cim[nr].style.position = "absolute";
    cim[nr].src = "/images/customisations/" + c.image_name;
    cim[nr].style.left = c.x+  "px";
    cim[nr].style.top = c.y +  "px";
    // cim[nr].height = Math.round(c.height/(c.ratio/1000));
    // cim[nr].width = 33;//Math.round(c.width/(c.ratio/100));
 
    cim[nr].style.transform = "rotate(" + c.rotation + "deg)";
    cim[nr].style.zIndex = c.z_layer;
    cim[nr].style.opacity = c.opacity/100;
//    cim[nr].style.pointerEvents= "none";
    cim[nr].style.userSelect = "none";
    document.body.appendChild(cim[nr]);
}

    function positionRelative() {
         for(i=0; i<customisations.length; i++) {
    //        alert("d");
            cim[i].style.left = bx + Math.round((customisations[i].x /10000 )*bdx) + "px";
            cim[i].style.top = by +ccy + Math.round((customisations[i].y /10000 )*bdy) + "px";
    //         tixt.innerHTML = cim[0].style.top + " " + Math.round(customisations[0].y); 
            cim[i].width =  Math.round(customisations[i].width/(customisations[i].ratio/1000)*window.innerWidth/1536);
            cim[i].height = Math.round(customisations[i].height*(customisations[i].ratio/1000)*window.innerHeight/723);
            
        }


        document.getElementById("name").style.left = Math.round(window.innerWidth*2.2/10)+"px";
        document.getElementById("name").style.top = Math.round(((window.innerHeight-21)*8.5/10)+21)+"px";
        document.getElementById("name").style.fontSize = Math.round(window.innerHeight/50+window.innerWidth/70)+"px";
        
    }

    function controlDown(x1, y1, x2, y2) {
        if (((event.clientX >= window.innerWidth*x1)&&(event.clientX <= window.innerWidth*x2))&&
        ((event.clientY >= (window.innerHeight - ccy)*y1+ccy)&&(event.clientY <= (window.innerHeight - ccy)*y2+ccy))){
            cddx = (event.clientX - window.innerWidth*x1)/((x2-x1)*window.innerWidth);
            cddy = (event.clientY - ccy - (window.innerHeight-ccy)*y1)/((y2-y1)*(window.innerHeight-ccy));
  //          alert("cddx: "+cddx + "  cddy: "+cddy);
            return true;
        } else { return false}
    }

    function doeSave() {
        markeer();
        mouseHold = false;
        customisations[counter].x = Math.round(10000*(parseInt(cim[counter].style.left)-bx)/bdx);
        customisations[counter].y = Math.round(10000*(parseInt(cim[counter].style.top)-by-ccy)/bdy);
        // customisations[counter].width = Math.floor(cim[counter].clientWidth/ dxf);
        // customisations[counter].height = Math.floor(cim[counter].clientHeight/ dyf);
        customisations[counter].opacity = cim[counter].style.opacity;
        customisations[counter].z_layer = cim[counter].style.zIndex;
        if(customisations[counter].opacity > 1) {customisations[counter].opacity = 1}
        loadDoc('POST', '/customisations/changedata', changeDiv, 'div6',  'name');
    }

    function essentialButtons(){
        if (controlDown(1/2,1/3,3/4,2/3)) { 
            fnMove();
        }
        if (controlDown(1/2,0,3/4,1/3)) { 
            fnBigger();
        }
        if (controlDown(1/2,7/9,5/8,8/9)) { 
            fnTurn(-1);
        }
        if (controlDown(5/8,7/9,3/4,8/9)) { 
            fnTurn(1);
        }
        if (controlDown(3/4,4/6,1,5/6)) { 
            fnRotation();
        }
        if (controlDown(3/4,5/6,4/4,6/6)) { 
            fnRatio();
        }
        
    }
    
    function mouseDown() {
        essentialButtons();
//        alert(event.clientX+ "  "+event.clientY);
        if (mouseHold) {
            document.getElementById("canvas").style.display = "none";
       //     markeer();
            doeSave();
            return
        }
        var laagste = 3000;
        var keuze = -1;
        for (i=0; i<cim.length; i++) {
            let afstandX = Math.abs(event.clientX - parseInt(cim[i].style.left) - Math.floor(cim[i].clientWidth/2));
            let afstandY = Math.abs(event.clientY - parseInt(cim[i].style.top) - Math.floor(cim[i].clientHeight/2));
            let deze = afstandX * afstandX + afstandY * afstandY;
            if (deze < laagste) { 
                laagste = deze;
                keuze = i;
            }
        }
        if (laagste < 2400) {
            counter = keuze;     
            fnVolgende(counter);           
            mouseCorX = event.clientX - parseInt(cim[counter].style.left);
            mouseCorY = event.clientY - parseInt(cim[counter].style.top);
            markeer();
            mouseHold = true;
            return
        }
        
   
    //    tixt.innerHTML = Math.abs(event.clientX - parseInt(cim[counter].style.left))+ " " +Math.floor(cim[counter].clientWidth);
       //alert(Math.abs(event.clientX - parseInt(cim[counter].style.left) - Math.floor(cim[counter].clientWidth/3))  );
    }   

    function mouseMove() {
    //  tixt2.innerHTML = "tixt2 "+event.clientX + " " + event.clientY+"   win: "+ window.innerWidth+ " "+window.innerHeight +
    //    "  ?"+ customisations[counter].image_name  ;
  //  tixt.innerHTML = event.clientX +" " + event.clientY + "   ";
       if (mouseHold) {
           cim[counter].style.left = event.clientX - mouseCorX +"px";
           cim[counter].style.top = event.clientY - mouseCorY +"px";
       }
      markeer();
    }

    function fnTurn(nr) {
        doeSave();
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
         document.getElementById("name").innerHTML = customisations[counter].name;
        document.getElementById("checkbox").checked = customisations[counter].visible;
        markeer();
    }

    function fnMouseZindex() {
        cim[counter].style.zIndex = Math.floor((event.offsetX/document.getElementById("divZindex").clientWidth - 0.5)*100 );
    //   tixt.innerHTML = Math.floor((event.offsetX/document.getElementById("divZindex").clientWidth - 0.5)*100 );
        // alert(e.clientX);
    }

   function fnLayer() {
        var zdx = event.offsetX/document.getElementById("dlayer").clientWidth;
        var zdy = event.offsetY/document.getElementById("dlayer").clientHeight;
        var dez = 0;
        if (((zdy<0.1)||(zdy>0.9))||(zdx<0.1)) { return}
        if (zdx < 0.2) 
        {
            dez = lowZindex()-1;
        } else 
        {
            if (zdx > 0.85) 
            {
                dez = highZindex()+1;
            } else 
            {
                dez = Math.floor((zdx-0.5)*300+40);
            }
        }
        cim[counter].style.zIndex = dez;
        doeSave();
    }

    function highZindex() 
    {
        var highZ = -10000;
        for (i=0; i<cim.length; i++) 
        {
            if (cim[i].style.zIndex > highZ) 
            {
                highZ = cim[i].style.zIndex;
            }
        } 
        return highZ;
    }

    function lowZindex() 
    {
        let lowZ = 100000;
        for (i=0; i<cim.length; i++) 
        {
            if (cim[i].style.zIndex < lowZ) 
            {
                lowZ = cim[i].style.zIndex;
            }
        } 
        return lowZ;
    }



    function fnRotation() {
        var dez = Math.round((cddx-0.5)*40);
     //   alert(dez);
        customisations[counter].rotation += dez;
        cim[counter].style.transform = "rotate(" + customisations[counter].rotation + "deg)";
        doeSave();
    }

    function fnTransparency() {
        let dx = 1-(event.offsetX/document.getElementById("dtransparency").clientWidth);
        let dy = event.offsetY/document.getElementById("dtransparency").clientHeight;
        if ((dx>0.9)||(dy>0.9)) { return}
        dx = dx*2-0.05;
        if (dx > 1) { dx = 1}
        cim[counter].style.opacity = dx;
 //      tixt.innerHTML = document.getElementById("div1").clientWidth+" "+document.getElementById("div1").clientHeight;
        doeSave();
    }

  function fnHor (dx) {
 //   if(((parseInt(cim[counter].style.left)<30)&&(dx<0))||((parseInt(cim[counter].style.left)>parseInt(window.innerWidth-150))&&(dx >0))) { return }
    // customisations[counter].x = parseInt(cim[counter].style.left);
    // cim[counter].style.left = customisations[counter].x+dx +"px";
    cim[counter].style.left = parseInt(cim[counter].style.left)+dx +"px";
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
    doeSave();
  }

  function fnVert (dy) {
 //   if(((parseInt(cim[counter].style.top)<-20)&&(dy<0))||(((parseInt(cim[counter].style.top)+parseInt(cim[counter].height))>window.innerHeight-150)&&(dy >0))) { return }
 //   customisations[counter].y = parseInt(cim[counter].style.top);
    cim[counter].style.top = parseInt(cim[counter].style.top)+dy +"px";
   }

  function fnMove() {
    // let dx = Math.floor(((event.offsetX-document.getElementById("dsize").clientWidth/2)/document.getElementById("dsize").clientWidth)*70);
    // let dy = Math.floor(((event.offsetY-document.getElementById("dsize").clientHeight/2)/document.getElementById("dsize").clientHeight)*70);
    fnHor(Math.round((cddx-0.5)*70));
    fnVert(Math.round((cddy-0.5)*70));
    doeSave();
 //   tixt.innerHTML = dx+" "+dy;
  }
 
  function fnSize(size) {
    if(((parseInt(cim[counter].height)<20)&&(size<1))||((parseInt(cim[counter].style.width)>parseInt(window.innerWidth-100))&&(dx >1))) { return }
    cim[counter].height = Math.round(customisations[counter].height*size*(customisations[counter].ratio/1000));
    cim[counter].width = Math.round(customisations[counter].width*size/(customisations[counter].ratio/1000));
    markeer();
    }

 
    function fnRatio() {
   //   alert("cddx: "+cddx + "  cddy: "+cddy);
   //   tixt.innerHTML = cddx+ " "+(cddx*0.1+0.95);
       if (cddy < 0.2) { return} 

        
      //   tixt.innerHTML = ((event.offsetX-document.getElementById("dsize").clientWidth/2)/document.getElementById("dsize").clientWidth)/10;
      //  let dx = ((event.offsetX-document.getElementById("dsize").clientWidth/2)/document.getElementById("dsize").clientWidth)/2;
 
           customisations[counter].ratio =Math.round(customisations[counter].ratio * (cddx*0.1+0.95));
      //      tixt.innerHTML =(cddx*0.1+0.99)+"  "+ customisations[counter].ratio;
        doeSave();
        positionRelative();
    }

    function fnBigger() {
   //   alert("cddx: "+cddx + "  cddy: "+cddy);
       if (cddy < 0.2) { return} 
        
      //   tixt.innerHTML = ((event.offsetX-document.getElementById("dsize").clientWidth/2)/document.getElementById("dsize").clientWidth)/10;
      //  let dx = ((event.offsetX-document.getElementById("dsize").clientWidth/2)/document.getElementById("dsize").clientWidth)/2;
        fnSize(1+(cddx-0.5)/2);
        customisations[counter].width *= (1+(cddx-0.5)/2);
        customisations[counter].height *= (1+(cddx-0.5)/2);
        doeSave();
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
    //   alert(cim[counter].style.opacity);
    //   alert(objToString(customisations[counter]));
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
  //  document.getElementById(div).innerHTML = xhttp.responseText;
}

  function drawWebsiteBorders() {
    bdx = Math.round(0.7 * window.innerWidth/2);
    bx = Math.round(0.15 * window.innerWidth/2);
    bdy = Math.round(bdx * (window.innerHeight/window.innerWidth));
    by = Math.round((window.innerHeight-ccy-bdy)/2)
     if ((window.innerHeight/window.innerWidth * bdx) > (window.innerHeight - ccy)*0.7) {
        bdy = Math.round(0.7 * (window.innerHeight-ccy));
        by = Math.round(0.15 * (window.innerHeight-ccy));
        bdx = Math.round(bdy * (window.innerWidth/window.innerHeight));
        by = Math.round((window.innerWidth/2-bdx)/2)
     }
    webBorder.width = Math.round(bdx / 0.7);
    webBorder.height = Math.round(window.innerHeight-ccy);
    ctx = webBorder.getContext("2d");
    ctx.clearRect(0, 0, webBorder.width, webBorder.height);
    ctx.strokeRect(bx,by,bdx,bdy);
    ctx.font = Math.round(window.innerWidth/300)+10+ "px Verdana";
    ctx.fillText("website borders", bx+window.innerWidth/150, by+7 + window.innerHeight/50);


 //   ctx.stroke();
//  ctx.fillStyle = "#FF0000";
//  ctx.fillRect(20, 20, 150, 100);
 }

function deleteData(item, indexToRemove) {
     item = customisations[counter].id;
        return fetch('/customisation/' + item, {
            method: 'delete',
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        })
        .then(response => response.json())
        .then(function(myJson) {
            console.log(JSON.stringify(myJson));
            console.log(myJson);
            if(myJson.id == item){
                // document.getElementsByClassName("for-wrapper")[indexToRemove].innerHTML = "";
                console.log("oke");
            } else {
                console.log("nietoke");
            }
        });
        }


   </script>


@endsection
